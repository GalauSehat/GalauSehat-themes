<?php get_header(); ?>   

<section class="posts">
    <div class="container mt-30">
        <div class="row lr">
		
		<?php get_template_part('content', 'featured'); ?>

		<?php get_template_part('content', 'ads'); ?>

		<?php get_template_part('content', 'tab'); ?>

		<div class="testsc">

		<?php
		    // Start the Loop.
		    if ( have_posts() ) :
		        
		            get_template_part( 'content', 'index' );
		        // Previous/next post navigation.
		        //twentyfourteen_paging_nav();
		    
		    else :
		        // If no content, include the "No posts found" template.
		        get_template_part( 'content', 'none' );
		    
		    endif;
		?>
        </div>
        </div>
    </div>

<!--end: post listing-->
<?php //get_template_part('pagination'); ?>


<?php //next_posts_link( 'Load More', $featured->max_num_pages ); ?>
<?php $nextPage = $paged + 1; ?>

<div class="container text-center mt-20">

</div>

<?php get_footer(); ?>