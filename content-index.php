            <!--start: post listing-->
            <!--start: style post 3 minor -->
        <div id="posto">
    	    <div id="postterkini">
                <?php
                $query    = array(
                                'post_type'             => 'post',
                                'orderby'               => 'post_date',
                                'order'                 => 'DESC',
                                'ignore_sticky_posts'   => true,
                                'paged'                 => $paged 

                            );

                $latestpost = new WP_Query( $query );

                if ( $latestpost->have_posts() ) :
                    while ( $latestpost->have_posts() ): $latestpost->the_post();
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
                <?php wp_reset_postdata(); ?>
            </div>
            <div id="postpopular">
                <?php
                $time = 'all';
                $query    = array(
                                'post_type'             => 'post',
                                'meta_key'              => '_count-views_'.$time,
                                'orderby'               => 'meta_value_num',
                                'ignore_sticky_posts'   => true,
                                'paged'                 => $paged 

                            );
                $popular = new WP_Query( $query );

                if ( $popular->have_posts() ) :
                    while ( $popular->have_posts() ): $popular->the_post();
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
                                            Oleh <?php echo get_the_author_meta('user_firstname'); ?> <?php echo get_the_author_meta('user_lastname'); ?>
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
