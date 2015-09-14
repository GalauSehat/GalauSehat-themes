<?php get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=333029946865563";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php  
    $url = catch_post_image(true, $post->ID, $post->post_content);
?>

<section class="page">
    <header class="row-table" style="background-image: url(<?php echo $url; ?>);"> <?php wp_reset_postdata(); ?>
        <div class="col-cell">
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-10 col-sm-offset-1">    
                        <?php the_title( '<h1>', '</h1>' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</section>        
<?php while ( have_posts() ) : the_post(); ?>
    <section class="single-med">
        <article class="container">
            <div class="row">
                <div class="article-text col-sm-8 col-sm-offset-2">
                    <?php the_content(); ?>
                </div>   
            </div>
        </article>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>