<?php get_header(); ?>

        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();
            
            if ( !get_post_format() ) {
                get_template_part( 'content', 'single' );
            } else {
                get_template_part( 'content', get_post_format() );
            }
                
        endwhile;
        ?>
    </div>
    <!-- Content End -->

    <?php get_template_part( 'single', 'related' ); ?>

<?php get_footer(); ?>