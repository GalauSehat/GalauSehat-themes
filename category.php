<?php get_header(); ?> 


<section class="category">
	<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <?php $ctgry = get_the_category($post->ID); $ct = $ctgry[0]->name; ?>
                    <div class="intro">KATEGORI</div>
                    <h1><?php echo $ct; ?></h1>
                </div>
                <div class="col-sm-8 col-sm-offset-2">    
                    <div class="execrpt"><?php echo category_description($ctgry[0]->term_id); ?></div>
                </div>
                </div>
            </div>    
        </div>    
    </header>
</section>        

<section class="posts">
    <div class="container">
        <div class="row lr">
        	<!--start: Tab Menu -->
            <?php get_template_part('content', 'tab'); ?>
            <!--end: Tab Menu -->

            <div id="posto">

            <div id="postterkini">
                <?php
                $query    = array(
                                'post_type'             => 'post',
                                'orderby'               => 'post_date',
                                'order'                 => 'DESC',
                                'ignore_sticky_posts'   => true,
                                'cat'                   => $ctgry[0]->term_id,
                                'paged'                 => $paged 

                            );

                $catpost = new WP_Query( $query );

                if ( $catpost->have_posts() ) :
                    while ( $catpost->have_posts() ): $catpost->the_post();
                        $url = catch_post_image(true, $post->ID, $post->post_content);
                        $ctgr = get_the_category($post->ID);
                        ?>
                        <div class="postscroll">
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
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div id="postpopular">
                <?php
                $time = 'all';
                $query    = array(
                                'post_type'             => 'post',
                                'meta_key'              => '_count-views_'.$time,
                                'orderby'               => 'meta_value_num',
                                'ignore_sticky_posts'   => true,
                                'cat'                   => $ctgry[0]->term_id,
                                'paged'                 => $paged 

                            );

                $catpost = new WP_Query( $query );

                if ( $catpost->have_posts() ) :
                    while ( $catpost->have_posts() ): $catpost->the_post();
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
                        <?php
                    endwhile;
                endif;
                ?>
            </div>

        </div>
            
        </div>
    </div>
</section>
<?php get_footer(); ?>        	