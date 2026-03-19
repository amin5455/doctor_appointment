<?php
add_action( 'wp_enqueue_scripts', 'tt5_child_enqueue_styles' );
function tt5_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function dp_filter_doctors_query( $query ) {
    // Sirf main query aur doctor archive page par kaam karo
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive('doctor') ) {
        
        if ( isset($_GET['specialization_filter']) && !empty($_GET['specialization_filter']) ) {
            
            $tax_query = array(
                array(
                    'taxonomy' => 'specialization',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field($_GET['specialization_filter']),
                ),
            );
            $query->set( 'tax_query', $tax_query );
        }
    }
}
add_action( 'pre_get_posts', 'dp_filter_doctors_query' );

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