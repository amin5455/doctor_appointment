<?php get_header(); ?>

<div style="padding: 50px 5%; max-width: 1200px; margin: 0 auto;">
    <h2 style="margin-bottom: 30px;">Search Results for: "<?php echo get_search_query(); ?>"</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #eee;">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:200px; object-fit:cover;')); ?>
                <?php endif; ?>
                
                <div style="padding: 20px;">
                    <h3 style="margin: 0;"><?php the_title(); ?></h3>
                    <p style="color: #666; font-size: 14px;"><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" style="color: #2563eb; font-weight: bold; text-decoration: none;">View Profile →</a>
                </div>
            </div>

        <?php endwhile; else : ?>
            <p>No doctors found matching your search. Try searching by doctor's name.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>