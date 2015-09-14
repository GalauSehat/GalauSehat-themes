<?php
  $url = catch_post_image(true, $post->ID, $post->post_content);
  $ctgr = get_the_category($post->ID);
?>
<div class="grid col-md-4 col-sm-6">
    <article class="card">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="holder">
            <div class="cover" style="background-image: url(<?php echo $url; ?>);"></div>
            <div class="caption">
                <?php the_title( '<h2>', '</h2>' ); ?>
                <div class="meta">
                    Oleh <?php the_author(); ?>
                    &middot;
                    <?php echo get_the_date( get_option( 'date_format' ) ); ?>
                </div>
            </div>
        </a>
        <div class="category"><?php $ctgr = $ctgr[0]; echo '<a href="' . get_bloginfo('url') . '/category/' . $ctgr->category_nicename . '">'; echo $ctgr->cat_name; echo  '</a>'; ?></div>
    </article>
</div>