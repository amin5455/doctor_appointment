<?php
add_action( 'wp_enqueue_scripts', 'tt5_child_enqueue_styles' );
function tt5_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function docportal_scripts() {
    // WordPress ki default jQuery load karein
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'docportal_scripts');


function fix_doctor_search_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
        // Sirf doctor post type ko search mein shamil karein
        $query->set( 'post_type', array( 'doctor' ) );
        
        // Ensure karein ke posts per page sahi hain
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'fix_doctor_search_query' );

function handle_doctor_booking() {
    // 1. Security Check (Nonces)
    if ( ! isset( $_POST['booking_security'] ) || ! wp_verify_nonce( $_POST['booking_security'], 'doctor_booking_nonce' ) ) {
        wp_die('Security check failed!');
    }

    // 2. Sanitize Data
    $name    = sanitize_text_field($_POST['user_name']);
    $email   = sanitize_email($_POST['user_email']);
    $message = sanitize_textarea_field($_POST['user_message']);
    $doc_id  = intval($_POST['doctor_id']);
    $doc_name = get_the_title($doc_id);

    // 3. Logic: For now, hum sirf admin ko email bhej dete hain
    $to = get_option('admin_email');
    $subject = "New Appointment Request for " . $doc_name;
    $body = "Name: $name \nEmail: $email \nMessage: $message";
    
    wp_mail($to, $subject, $body);

    // 4. Redirect back with success message
    wp_redirect( add_query_arg('booking', 'success', get_permalink($doc_id)) );
    exit;
}

// Hook for logged in and logged out users
add_action('admin_post_submit_doctor_booking', 'handle_doctor_booking');
add_action('admin_post_nopriv_submit_doctor_booking', 'handle_doctor_booking');

function force_search_template( $template ) {
    if ( is_search() ) {
        $new_template = locate_template( array( 'search.php' ) );
        if ( '' != $new_template ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'force_search_template' );


function aminali_search_join( $join ) {
    global $wpdb;
    if ( is_search() && !is_admin() ) {
        $join .= " LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id ";
        $join .= " LEFT JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id ";
        $join .= " LEFT JOIN {$wpdb->terms} t ON t.term_id = tt.term_id ";
    }
    return $join;
}
add_filter( 'posts_join', 'aminali_search_join' );

function aminali_search_where( $where ) {
    global $wpdb;
    if ( is_search() && !is_admin() ) {
        $where .= " OR (t.name LIKE '%" . get_search_query() . "%' AND {$wpdb->posts}.post_type = 'doctor' AND {$wpdb->posts}.post_status = 'publish')";
    }
    return $where;
}
add_filter( 'posts_where', 'aminali_search_where' );

function aminali_search_distinct( $where ) {
    if ( is_search() && !is_admin() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'aminali_search_distinct' );


/**
 * Doctor Archive Page par Specialization Filter ko Active karna
 */
function aminali_doctor_archive_filter( $query ) {
    // Sirf Front-end, Main Query aur Doctor Archive par kaam kare
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'doctor' ) ) {

        // Agar URL mein specialization_filter maujood hai
        if ( isset( $_GET['specialization_filter'] ) && $_GET['specialization_filter'] != '' ) {
            
            $tax_query = array(
                array(
                    'taxonomy' => 'specialization',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field( $_GET['specialization_filter'] ),
                ),
            );

            $query->set( 'tax_query', $tax_query );
        }
    }
}

add_action( 'pre_get_posts', 'aminali_doctor_archive_filter' );

function create_appointments_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'doctor_appointments';
    $charset_collate = $wpdb->get_charset_collate();

    // dbDelta ke liye format bohot zaroori hai (2 spaces after types)
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        appointment_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        patient_name varchar(100) NOT NULL,
        patient_email varchar(100) NOT NULL,
        doctor_id mediumint(9) NOT NULL,
        status varchar(20) DEFAULT 'pending' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
    // Table create karne ki koshish
    dbDelta( $sql );

    // Debugging: Check karne ke liye ke table bani ya nahi
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        error_log("Table Creation Failed: $table_name");
    }
}

// add_action('init', 'create_appointments_table');


// AJAX Handler for Booking
add_action('wp_ajax_book_appointment', 'handle_booking_request');
add_action('wp_ajax_nopriv_book_appointment', 'handle_booking_request');

function handle_booking_request() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'doctor_appointments';

    // Data collect karein
    $name = sanitize_text_field($_POST['p_name']);
    $date = sanitize_text_field($_POST['app_date']);
    $doc_id = intval($_POST['doctor_id']);

    // Database mein insert karein
    $result = $wpdb->insert(
        $table_name,
        array(
            'patient_name' => $name,
            'appointment_date' => $date,
            'doctor_id' => $doc_id,
            'status' => 'pending'
        )
    );

    if ($result) {
        wp_send_json_success('Appointment booked successfully!');
    } else {
        wp_send_json_error('Database error, please try again.');
    }
    wp_die();
}


add_action('wp_ajax_gemini_chat', 'handle_gemini_chat');
add_action('wp_ajax_nopriv_gemini_chat', 'handle_gemini_chat');

function handle_gemini_chat() {
    $msg = sanitize_text_field($_POST['message']);
    require_once get_stylesheet_directory() . '/inc/gemini-handler.php';
    $response = get_gemini_suggestion($msg);
    wp_send_json_success($response);
}