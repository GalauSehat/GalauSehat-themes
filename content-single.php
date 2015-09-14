<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=72479198767257";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<section class="single-med">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-sm-8 col-sm-offset-2">    
                    <div class="execrpt"><?php echo get_the_excerpt(); ?></div>
                    <div class="meta text-uppercase">
                        <?php $ctgr = get_the_category($post->ID); ?>
                        <a href="<?php bloginfo( 'url' ); ?>/category/<?php echo $ctgr[0]->name; ?>"><?php echo $ctgr[0]->name; ?></a>
                        &middot;
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('user_firstname'); ?> <?php echo get_the_author_meta('user_lastname'); ?></a>
                        &middot;
                        <?php echo get_the_date( get_option( 'date_format' ) ); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="featured" style="background-image: url(<?php echo catch_post_image(true, $post->ID, $post->post_content); ?>);"></div>
                </div>    
            </div>    
        </div>    
    </header>    

    <article class="container">
        <div class="row">
            <div class="article-text col-sm-8 col-sm-offset-2">
                <?php the_content(); ?>
                <p class="pt-20"><b class="text-uppercase text-muted" style="font-size: 12px;">Bagikan Artikel Ini</b></p>
                <div class="social-share row row-sm">
                    <div class="col-sm col-sm-4 mb-5"><a href="https://twitter.com/share?url=<?php echo wp_get_shortlink(); ?>&text=<?php the_title(); ?>" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i><b>Twitter</b></a></div>
                    <div class="col-sm col-sm-4 mb-5"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink(); ?>" class="btn btn-social btn-facebook"><i class="fa fa-facebook-square"></i><b>Facebook</b></a></div>
                    <div class="col-sm col-sm-4 mb-5"><a href="#" class="btn btn-social btn-google"><i class="fa fa-google-plus"></i><b>Google</b></a></div>
                </div>

                <hr class="hr-lg hr-2" />

                <!--<p>
                    <b class="text-muted text-uppercase" style="font-size: 12px;">Penulis</b>
                </p>-->
                <div class="author">
                    <div class="author-bio">
                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('user_firstname'); ?> <?php echo get_the_author_meta('user_lastname'); ?></a></h3>
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="pull-right"><?php echo get_avatar(get_the_author_meta('ID'), 85); ?></a>
                            <div><?php echo get_the_author_meta('description'); ?></div>
                            <div class="clearfix"></div>
                            <div class="text-muted text-bold text-small text-uppercase mt-20 div-dotted">
                                <?php if( get_the_author_meta('facebook')!='' ) : ?><div><a href="<?php echo get_the_author_meta('facebook'); ?>" target="_blank"> Facebook</a></div><?php endif; ?>
                                <?php if( get_the_author_meta('twitter')!='' ) : ?><div><a href="<?php echo get_the_author_meta('twitter'); ?>" target="_blank"> Twitter</a></div><?php endif; ?>
                                <?php if( get_the_author_meta('instagram')!='' ) : ?><div><a href="<?php echo get_the_author_meta('instagram'); ?>" target="_blank"> Instagram</a></div><?php endif; ?>
                                <?php if( get_the_author_url('website')!='' ) : ?><div><a href="<?php echo get_the_author_url('website'); ?>" target="_blank"> Website</a></div><?php endif; ?>
                        </div>         
                    </div>
                </div>

                <hr class="hr-lg">

               
            </div>
            <div class="col-sm-12">
                <!--start: ads-->
                    <div class="clearfix"></div>
                    <div class="ads-single pt-30">
                        <a class="holder hidden-xs" href="#"><img class="img-responsive" src="http://galausehat.id/wp-content/uploads/2015/08/Indonesian-Flag.png"></a>
                        <a class="holder visible-xs" href="#"><img class="img-responsive" src="http://galausehat.id/wp-content/uploads/2015/08/indonesia2.jpg"></a>
                    </div>
                <!--end: ads-->
            </div>    
        </div>
    </article>
</section>
<hr>