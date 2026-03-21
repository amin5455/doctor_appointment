<?php get_header(); ?>

<?php get_header(); ?>

<section class="hero-section" style="
    position: relative;
    min-height: 80vh;
    display: flex;
    align-items: center;
    background: #1e293b; /* Fallback color */
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
">
    <div class="hero-bg" style="
        position: absolute;
        top: 0;
        right: 0;
        width: 67%;
        height: 119%;
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/doc1.jpg'); 
        background-size: cover;
        background-position: right center;
        z-index: 1;
    "></div>

    <div class="overlay" style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, #1e293b 30%, rgba(30, 41, 59, 0.8) 60%, rgba(30, 41, 59, 0.2) 100%);
        z-index: 2;
    "></div>

    <div class="container" style="
        position: relative;
        z-index: 3;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5%;
        width: 100%;
    ">
        <div style="max-width: 600px; color: white;">
            <span style="background: #2563eb; color: white; padding: 5px 15px; border-radius: 50px; font-size: 14px; font-weight: 600; letter-spacing: 1px;">
                TRUSTED MEDICAL NETWORK
            </span>
            
            <h1 style="font-size: 3.5rem; line-height: 1.2; margin: 20px 0; font-weight: 800;">
                Your Health Is Our <span style="color: #3b82f6;">Top Priority</span>
            </h1>
            
            <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 35px; line-height: 1.6;">
                Book appointments with world-class specialists. Get personalized care and expert medical advice from the comfort of your home.
            </p>

            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" style="
                display: flex;
                background: white;
                padding: 8px;
                border-radius: 12px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
            ">
                <input type="text" name="s" placeholder="Search doctor by name..." value="<?php echo get_search_query(); ?>" style="
                    flex: 1;
                    border: none;
                    padding: 12px 20px;
                    outline: none;
                    color: #333;
                    font-size: 16px;
                ">
                <input type="hidden" name="post_type" value="doctor" />
                <button type="submit" style="
                    background: #2563eb;
                    color: white;
                    border: none;
                    padding: 12px 30px;
                    border-radius: 8px;
                    cursor: pointer;
                    font-weight: bold;
                    transition: 0.3s;
                ">Find Doctor</button>
            </form>

            <div style="margin-top: 25px; display: flex; gap: 20px; font-size: 14px; opacity: 0.8;">
                <span>⭐ 4.9/5 Rating</span>
                <span>✅ 100% Secure</span>
                <span>👨‍⚕️ Verified Doctors</span>
            </div>
        </div>
    </div>
</section>



<section style="padding: 80px 5%; background: #ffffff; font-family: 'Poppins', sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; margin-bottom: 80px; text-align: center;">
            <div style="padding: 20px; border-right: 1px solid #e2e8f0;">
                <h2 style="font-size: 2.5rem; color: #2563eb; margin: 0;">150+</h2>
                <p style="color: #64748b; font-weight: 500;">Expert Doctors</p>
            </div>
            <div style="padding: 20px; border-right: 1px solid #e2e8f0;">
                <h2 style="font-size: 2.5rem; color: #2563eb; margin: 0;">10k+</h2>
                <p style="color: #64748b; font-weight: 500;">Happy Patients</p>
            </div>
            <div style="padding: 20px; border-right: 1px solid #e2e8f0;">
                <h2 style="font-size: 2.5rem; color: #2563eb; margin: 0;">24/7</h2>
                <p style="color: #64748b; font-weight: 500;">Emergency Care</p>
            </div>
            <div style="padding: 20px;">
                <h2 style="font-size: 2.5rem; color: #2563eb; margin: 0;">4.9/5</h2>
                <p style="color: #64748b; font-weight: 500;">Patient Rating</p>
            </div>
        </div>

        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.2rem; color: #1e293b;">Why Book With DocPortal?</h2>
            <p style="color: #64748b; max-width: 600px; margin: 15px auto;">We provide a seamless experience to find and book appointments with the best medical professionals.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            
            <div class="feature-box" style="padding: 40px; border-radius: 20px; background: #f8fafc; border: 1px solid #e2e8f0; transition: 0.3s;">
                <div style="font-size: 45px; margin-bottom: 20px;">🔍</div>
                <h3 style="color: #1e293b; margin-bottom: 15px;">Easy Search</h3>
                <p style="color: #64748b; line-height: 1.6;">Search doctors by specialization, fee, or name. Our smart filters help you find the right match in seconds.</p>
            </div>

            <div class="feature-box" style="padding: 40px; border-radius: 20px; background: #f8fafc; border: 1px solid #e2e8f0; transition: 0.3s;">
                <div style="font-size: 45px; margin-bottom: 20px;">📅</div>
                <h3 style="color: #1e293b; margin-bottom: 15px;">Instant Booking</h3>
                <p style="color: #64748b; line-height: 1.6;">No more waiting on phone calls. Book your time slot directly through our real-time appointment system.</p>
            </div>

            <div class="feature-box" style="padding: 40px; border-radius: 20px; background: #f8fafc; border: 1px solid #e2e8f0; transition: 0.3s;">
                <div style="font-size: 45px; margin-bottom: 20px;">🤖</div>
                <h3 style="color: #1e293b; margin-bottom: 15px;">AI Consultation</h3>
                <p style="color: #64748b; line-height: 1.6;">Use our built-in Gemini AI assistant to get basic medical guidance and doctor recommendations based on symptoms.</p>
            </div>

        </div>
    </div>
</section>

<section style="padding: 100px 5%; background: #f1f5f9;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 50px;">
            <div>
                <h2 style="font-size: 2.2rem; color: #1e293b; margin: 0;">Our Top Specialists</h2>
                <p style="color: #64748b; margin-top: 10px;">Book appointments with our most-rated medical experts.</p>
            </div>
            <a href="<?php echo get_post_type_archive_link('doctor'); ?>" style="color: #2563eb; font-weight: 700; text-decoration: none; border-bottom: 2px solid #2563eb; padding-bottom: 5px;">View All Doctors →</a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            <?php
            $home_docs = new WP_Query(array(
                'post_type' => 'doctor',
                'posts_per_page' => 6,
                'orderby' => 'rand'
            ));

            if($home_docs->have_posts()) : while($home_docs->have_posts()) : $home_docs->the_post(); 
                $fee = get_field('consultation_fee');
                $education = get_field('education');
            ?>
                <div class="doc-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); transition: 0.3s; border: 1px solid #e2e8f0;">
                    
                    <div style="position: relative;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 250px; object-fit: cover;')); ?>
                        <?php else: ?>
                            <div style="width: 100%; height: 250px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 40px;">👨‍⚕️</div>
                        <?php endif; ?>
                        
                        <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.9); padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; color: #16a34a;">
                            ● Online Now
                        </div>
                    </div>

                    <div style="padding: 25px;">
                        <span style="color: #2563eb; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                            <?php echo strip_tags(get_the_term_list(get_the_ID(), 'specialization', '', ', ')); ?>
                        </span>
                        
                        <h3 style="margin: 10px 0 5px 0; color: #1e293b; font-size: 1.25rem;"><?php the_title(); ?></h3>
                        <p style="color: #64748b; font-size: 14px; margin-bottom: 20px;"><?php echo wp_trim_words($education, 8); ?></p>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                            <div>
                                <span style="display: block; font-size: 12px; color: #94a3b8;">Consultation Fee</span>
                                <span style="font-weight: 800; color: #1e293b; font-size: 1.1rem;">$<?php echo $fee; ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" style="background: #1e293b; color: white; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-size: 14px; font-weight: 600;">Book Now</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>


<section style="padding: 100px 5%; background: #ffffff; font-family: 'Poppins', sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
        
        <span style="color: #2563eb; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">Testimonials</span>
        <h2 style="font-size: 2.5rem; color: #1e293b; margin: 15px 0 50px 0;">What Our Patients Say</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            
            <div style="background: #f8fafc; padding: 40px; border-radius: 25px; border: 1px solid #e2e8f0; text-align: left; position: relative;">
                <div style="color: #fbbf24; font-size: 20px; margin-bottom: 20px;">★★★★★</div>
                <p style="color: #475569; line-height: 1.7; font-style: italic;">"The booking process was incredibly smooth. I found a top cardiologist and booked my slot within 2 minutes. Highly recommended!"</p>
                <div style="margin-top: 30px; display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #2563eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">AK</div>
                    <div>
                        <h4 style="margin: 0; color: #1e293b;">Ahmed Khan</h4>
                        <small style="color: #94a3b8;">Heart Patient</small>
                    </div>
                </div>
            </div>

            <div style="background: #f8fafc; padding: 40px; border-radius: 25px; border: 1px solid #e2e8f0; text-align: left;">
                <div style="color: #fbbf24; font-size: 20px; margin-bottom: 20px;">★★★★★</div>
                <p style="color: #475569; line-height: 1.7; font-style: italic;">"I was confused about my symptoms, but the AI assistant guided me to the right specialist. Great innovation in healthcare!"</p>
                <div style="margin-top: 30px; display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">SR</div>
                    <div>
                        <h4 style="margin: 0; color: #1e293b;">Sara Raza</h4>
                        <small style="color: #94a3b8;">Dermatology Patient</small>
                    </div>
                </div>
            </div>

            <div style="background: #f8fafc; padding: 40px; border-radius: 25px; border: 1px solid #e2e8f0; text-align: left;">
                <div style="color: #fbbf24; font-size: 20px; margin-bottom: 20px;">★★★★★</div>
                <p style="color: #475569; line-height: 1.7; font-style: italic;">"Professional doctors and very transparent fee structure. No hidden charges, just pure medical excellence."</p>
                <div style="margin-top: 30px; display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; background: #6366f1; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">MZ</div>
                    <div>
                        <h4 style="margin: 0; color: #1e293b;">M. Zubair</h4>
                        <small style="color: #94a3b8;">Orthopedic Patient</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section style="padding: 80px 5%; background: linear-gradient(135deg, #2563eb, #1e40af); text-align: center; color: white;">
    <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Ready to Book Your Appointment?</h2>
    <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">Don't wait for your health issues to grow. Consult with our specialists today.</p>
    <a href="<?php echo get_post_type_archive_link('doctor'); ?>" style="background: white; color: #2563eb; padding: 18px 45px; border-radius: 50px; text-decoration: none; font-weight: 800; font-size: 1.1rem; display: inline-block; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">Find Your Doctor Now</a>
</section>

<?php get_footer(); ?>