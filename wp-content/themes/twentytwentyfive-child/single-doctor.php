<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 
    // ACF Fields (Agar aapne banaye hain)
    $fee = get_field('consultation_fee');
    $education = get_field('education');
    $experience = get_field('experience');
    $timing = get_field('availability_timing');
?>

<main style="background: #f8fafc; padding: 60px 5%; font-family: 'Poppins', sans-serif;">
    <div style="max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; gap: 30px; align-items: center; margin-bottom: 40px;">
                <div style="width: 200px; height: 200px; border-radius: 20px; overflow: hidden; background: #e2e8f0;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                    <?php else: ?>
                        <div style="height: 100%; display: flex; align-items: center; justify-content: center; font-size: 50px;">👨‍⚕️</div>
                    <?php endif; ?>
                </div>
                <div>
                    <span style="color: #2563eb; font-weight: 700; text-transform: uppercase; font-size: 14px;">
                        <?php echo strip_tags(get_the_term_list(get_the_ID(), 'specialization', '', ', ')); ?>
                    </span>
                    <h1 style="margin: 10px 0; color: #1e293b; font-size: 2.5rem;"><?php the_title(); ?></h1>
                    <p style="color: #64748b; font-size: 1.1rem;"><?php echo $education; ?></p>
                    <div style="margin-top: 15px;">
                        <span style="background: #dcfce7; color: #166534; padding: 5px 15px; border-radius: 50px; font-weight: 600; font-size: 14px;">⭐ 4.9 Patient Rating</span>
                    </div>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #f1f5f9; margin-bottom: 30px;">

            <h3 style="color: #1e293b; margin-bottom: 15px;">About Doctor</h3>
            <div style="color: #475569; line-height: 1.8; font-size: 1.05rem;">
                <?php the_content(); ?>
            </div>

            <div style="margin-top: 40px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="background: #f1f5f9; padding: 20px; border-radius: 15px;">
                    <h5 style="margin: 0; color: #64748b;">Experience</h5>
                    <p style="margin: 5px 0 0 0; font-weight: 700; color: #1e293b;"><?php echo $experience; ?> Years</p>
                </div>
                <div style="background: #f1f5f9; padding: 20px; border-radius: 15px;">
                    <h5 style="margin: 0; color: #64748b;">Consultation Fee</h5>
                    <p style="margin: 5px 0 0 0; font-weight: 700; color: #1e293b;">$<?php echo $fee; ?></p>
                </div>
            </div>
        </div>
<aside>
        <div id="booking-section" style="background: #f8fafc; padding: 20px; border-radius: 12px; margin-top: 20px;">
    <h4 style="margin-bottom: 15px;">Book an Appointment</h4>
    <form id="doctor-booking-form">
        <input type="text" name="p_name" placeholder="Your Name" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:5px; border:1px solid #ddd;">
        <input type="date" name="app_date" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:5px; border:1px solid #ddd;">
        <input type="hidden" name="doctor_id" value="<?php echo get_the_ID(); ?>">
        <button type="submit" style="width: 100%; background: #2563eb; color: white; padding: 12px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
            Confirm Booking
        </button>
    </form>
    <div id="booking-message" style="margin-top:10px; font-weight:bold;"></div>
</div>
        
            <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); position: sticky; top: 100px;">
                <h3 style="margin-top: 0; color: #1e293b; margin-bottom: 25px;">Book Appointment</h3>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; color: #64748b; margin-bottom: 10px;">Availability</label>
                    <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border: 1px solid #e2e8f0;">
                        <span style="font-weight: 600; color: #1e293b;">🕒 <?php echo $timing; ?></span>
                    </div>
                </div>

                <button onclick="alert('Booking feature coming soon with Gemini AI!')" style="width: 100%; background: #2563eb; color: white; border: none; padding: 15px; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s;">
                    Secure Your Slot
                </button>

                <p style="text-align: center; font-size: 13px; color: #94a3b8; margin-top: 15px;">
                    No payment required upfront.
                </p>
            </div>
        </aside>

    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<script>
(function($) {
    $(document).ready(function() {
        $('#doctor-booking-form').on('submit', function(e) {
            e.preventDefault();
            
            let $form = $(this);
            let $messageDiv = $('#booking-message');
            let formData = $form.serialize();

            // Button ko disable karein taake double click na ho
            $form.find('button').prop('disabled', true).text('Booking...');

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: formData + '&action=book_appointment',
                success: function(response) {
                    if(response.success) {
                        $messageDiv.html('<p style="color:green; padding:10px; background:#f0fdf4; border-radius:5px;">✅ ' + response.data + '</p>');
                        $form[0].reset();
                    } else {
                        $messageDiv.html('<p style="color:red;"> Error! Please try again.</p>');
                    }
                },
                error: function() {
                    $messageDiv.html('<p style="color:red;"> Server error. Check connection.</p>');
                },
                complete: function() {
                    $form.find('button').prop('disabled', false).text('Confirm Booking');
                }
            });
        });
    });
})(jQuery);
</script>