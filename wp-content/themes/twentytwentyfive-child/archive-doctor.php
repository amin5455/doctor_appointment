<?php get_header(); ?>

<div style="max-width: 1200px; margin: 50px auto; padding: 0 20px;">
    <h1 style="text-align: center; margin-bottom: 40px; font-family: sans-serif;">Our Specialists</h1>

    <div class="doctor-filter" style="margin-bottom: 40px; text-align: center; background: #f1f5f9; padding: 20px; border-radius: 12px;">
    <form action="<?php echo get_post_type_archive_link('doctor'); ?>" method="GET" style="display: flex; gap: 15px; justify-content: center; align-items: center;">
        
        <label for="spec" style="font-weight: bold; color: #1e293b;">Find by Specialization:</label>
        
        <select name="specialization_filter" id="spec" style="padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; min-width: 200px;">
            <option value="">All Specializations</option>
            <?php
            $terms = get_terms(array('taxonomy' => 'specialization', 'hide_empty' => true));
            foreach ($terms as $term) {
                $selected = (isset($_GET['specialization_filter']) && $_GET['specialization_filter'] == $term->slug) ? 'selected' : '';
                echo '<option value="' . $term->slug . '" ' . $selected . '>' . $term->name . '</option>';
            }
            ?>
        </select>

        <button type="submit" style="background: #2563eb; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: 600;">Filter Now</button>
        
        <?php if(isset($_GET['specialization_filter']) && $_GET['specialization_filter'] != ''): ?>
            <a href="<?php echo get_post_type_archive_link('doctor'); ?>" style="color: #64748b; font-size: 0.9rem; text-decoration: none;">Clear All</a>
        <?php endif; ?>

    </form>
</div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <div class="doctor-card" style="border: 1px solid #e2e8f0; border-radius: 15px; overflow: hidden; transition: 0.3s; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); background: #fff; text-align: center; padding: 20px;">
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium', array('style' => 'width:120px; height:120px; border-radius:50%; object-fit:cover; margin-bottom: 15px; border: 3px solid #2563eb;')); ?>
                <?php endif; ?>

                <h3 style="margin: 0 0 5px 0; color: #1e293b;"><?php the_title(); ?></h3>
                
                <p style="color: #2563eb; font-size: 0.9rem; font-weight: 600; margin-bottom: 10px;">
                    <?php echo strip_tags( get_the_term_list( get_the_ID(), 'specialization', '', ', ' ) ); ?>
                </p>

                <p style="background: #f1f5f9; display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; color: #475569;">
                    Consultation: <strong>$<?php echo get_field('consultation_fee'); ?></strong>
                </p>

                <div style="margin-top: 20px;">
                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; background: #1e293b; color: #fff; padding: 10px 25px; border-radius: 8px; font-size: 0.9rem; display: block;">View Full Profile</a>
                </div>
            </div>

        <?php endwhile; else : ?>
            <p>No doctors found.</p>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>