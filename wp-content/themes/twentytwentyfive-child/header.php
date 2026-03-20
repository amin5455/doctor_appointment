<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        .main-nav { display: flex; justify-content: space-between; align-items: center; padding: 20px 5%; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 1000; }
        .nav-links { display: flex; gap: 30px; list-style: none; align-items: center; }
        .nav-links a { text-decoration: none; color: #1e293b; font-weight: 600; font-family: sans-serif; }
        .dropbtn { background: #f1f5f9; padding: 8px 15px; border-radius: 5px; cursor: pointer; }
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #fff; min-width: 200px; box-shadow: 0px 8px 16px rgba(0,0,0,0.1); z-index: 1; border-radius: 8px; }
        .dropdown-content a { color: #333; padding: 12px 16px; display: block; }
        .dropdown:hover .dropdown-content { display: block; }
        .btn-appointment { background: #2563eb; color: #fff !important; padding: 10px 25px; border-radius: 50px; }
    </style>
</head>
<body <?php body_class(); ?>>

<header class="main-nav">
    <div class="logo">
        <a href="<?php echo home_url(); ?>" style="font-size: 24px; font-weight: 800; color: #2563eb; text-decoration: none;">DOC<span style="color: #1e293b;">PORTAL</span></a>
    </div>
    
    <ul class="nav-links">
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="dropdown">
            <span class="dropbtn">Find Doctors ▾</span>
            <div class="dropdown-content">
                <?php
                $categories = get_terms(array('taxonomy' => 'specialization', 'hide_empty' => false));
                foreach($categories as $cat) {
                    echo '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
                }
                ?>
                <hr>
                <a href="<?php echo get_post_type_archive_link('doctor'); ?>"><b>All Doctors</b></a>
            </div>
        </li>
        <li><a href="<?php echo site_url('/services'); ?>">Services</a></li>
        <li><a href="<?php echo get_post_type_archive_link('doctor'); ?>" class="btn-appointment">Book Now</a></li>
    </ul>
</header>
