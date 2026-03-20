<?php get_header(); ?>

<section style="background: #f1f5f9; padding: 60px 5%; text-align: center; border-bottom: 1px solid #e2e8f0;">
    <span style="color: #2563eb; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Specialist Directory</span>
    <h1 style="font-size: 2.5rem; color: #1e293b; margin-top: 10px;">
        Best <?php single_term_title(); ?> Specialists
    </h1>
    <p style="color: #64748b; max-width: 600px; margin: 15px auto;">
        Showing all verified doctors specialized in <?php single_term_title(); ?>.
    </p>
</section>

<section style="padding: 80px 5%; background: #ffffff;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $fee = get_field('consultation_fee');
                $education = get_field('education');
            ?>
                <div class="doc-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 15px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; transition: 0.3s;">
                    <div style="height: 200px; background: #e2e8f0;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                        <?php endif; ?>
                    </div>
                    
                    <div style="padding: 20px;">
                        <h3 style="margin: 0; color: #1e293b;"><?php the_title(); ?></h3>
                        <p style="color: #64748b; font-size: 14px; margin: 10px 0;"><?php echo wp_trim_words($education, 6); ?></p>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #f1f5f9;">
                            <span style="font-weight: 800; color: #1e293b;">$<?php echo $fee; ?></span>
                            <a href="<?php the_permalink(); ?>" style="color: #2563eb; font-weight: 700; text-decoration: none;">View Profile →</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p>No doctors found in this category.</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>