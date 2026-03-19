<?php get_header(); 

if(isset($_GET['booking']) && $_GET['booking'] == 'success') { echo "Thank you! We will contact you soon."; }
?>
<div class="doctor-profile">
    <h1><?php the_title(); ?></h1>
    <div class="bio"><?php the_content(); ?></div>
    
    <p><strong>Education:</strong> <?php echo get_post_meta(get_the_ID(), 'education', true); ?></p>
    <p><strong>Fee:</strong> $<?php echo get_post_meta(get_the_ID(), 'consultation_fee', true); ?></p>
</div>

<div class="booking-form" style="margin-top: 50px; background: #f8fafc; padding: 30px; border-radius: 15px; border: 1px solid #e2e8f0;">
    <h3>Book an Appointment with <?php the_title(); ?></h3>
    
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
        <?php wp_nonce_field('doctor_booking_nonce', 'booking_security'); ?>
        
        <input type="hidden" name="doctor_id" value="<?php echo get_the_ID(); ?>">
        <input type="hidden" name="action" value="submit_doctor_booking">

        <div style="margin-bottom: 15px;">
            <input type="text" name="user_name" placeholder="Your Full Name" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <input type="email" name="user_email" placeholder="Your Email Address" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
        </div>

        <div style="margin-bottom: 15px;">
            <textarea name="user_message" placeholder="Briefly describe your issue..." rows="4" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;"></textarea>
        </div>

        <button type="submit" style="background: #2563eb; color: white; border: none; padding: 12px 30px; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%;">Confirm Booking</button>
    </form>
</div>
<?php get_footer(); ?>