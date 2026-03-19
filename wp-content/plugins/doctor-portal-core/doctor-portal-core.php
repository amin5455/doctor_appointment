<?php
/**
 * Plugin Name: Doctor Portal Core
 * Description: Custom Post Types and Logic for Doctor Portal.
 * Version: 1.0
 * Author: Amin Ali
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Security check

function dp_register_doctor_cpt() {
    $args = array(
        'labels'      => array('name' => 'Doctors', 'singular_name' => 'Doctor'),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-businessman', // Doctor ka icon
        'supports'    => array('title', 'editor', 'thumbnail'), // Title, Bio aur Image
    );
    register_post_type('doctor', $args);
}
add_action('init', 'dp_register_doctor_cpt');

function dp_register_specialization_taxonomy() {
    register_taxonomy('specialization', 'doctor', array(
        'labels' => array('name' => 'Specializations'),
        'hierarchical' => true, // Category ki tarah kaam karega
        'show_admin_column' => true,
    ));
}
add_action('init', 'dp_register_specialization_taxonomy');