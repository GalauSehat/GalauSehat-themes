<section class="writer">
	<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <p class="author-avatar"><?php echo get_avatar(get_the_author_meta('ID'), 85); ?></p>
                    <h1><?php echo get_the_author_meta('user_firstname'); ?> <?php echo get_the_author_meta('user_lastname'); ?></h1>
                </div>
                <div class="col-sm-8 col-sm-offset-2">    
                    <div class="execrpt"><?php echo get_the_author_meta('description'); ?></div>
                    <div class="text-muted text-bold text-small text-uppercase mt-10 div-dotted">
                        <?php if( get_the_author_meta('facebook')!='' ) : ?><div><a href="<?php echo get_the_author_meta('facebook'); ?>" target="_blank"> Facebook</a></div><?php endif; ?>
                        <?php if( get_the_author_meta('twitter')!='' ) : ?><div><a href="<?php echo get_the_author_meta('twitter'); ?>" target="_blank"> Twitter</a></div><?php endif; ?>
                        <?php if( get_the_author_meta('instagram')!='' ) : ?><div><a href="<?php echo get_the_author_meta('instagram'); ?>" target="_blank"> Instagram</a></div><?php endif; ?>
                        <?php if( get_the_author_url('website')!='' ) : ?><div><a href="<?php echo get_the_author_url('website'); ?>" target="_blank"> Website</a></div><?php endif; ?>
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
        	<!--start: style post 3 minor -->
            <div id="posto">
                <div id="postterkini"><?php galausehat_author_all_posts(get_the_author_meta('ID'), $pos = 'terkini'); ?></div>
                <div id="postpopular"><?php galausehat_author_all_posts(get_the_author_meta('ID'), $pos = 'popular'); ?></div>
            </div>
            <!--End: style post 3 minor -->
        </div>
    </div>
</section>