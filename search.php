<?php get_header(); ?> 


<section class="category">
	<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <?php $ctgry = get_the_category($post->ID); $ct = $ctgry[0]->name ?>
                    <div class="intro">Daftar Pencarian</div>
                    <h1></h1>
                </div>
                <div class="col-sm-8 col-sm-offset-2">    
                    <div class="execrpt">&quot;<?php echo get_search_query(); ?>&quot;</div>
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
            <div class="tab-menu-container">
                <div class="tab-menu">
                    <ul>
                        <li class="active"><a href="#">Terkini</a></li>
                        <li><a href="#">Populer</a></li>
                    </ul>
                </div>
            </div>  
            <!--end: Tab Menu -->
            <?php
                if(have_posts()):    
                	while(have_posts()) : the_post();
                    	get_template_part( 'content', 'search' );
                  	endwhile;
				else :
						// If no content, include the "No posts found" template.
						//get_template_part( 'content', 'none' );
			            echo '<div class="grid col-md-12 col-sm-12">
			                    <p class="text-center">Sorry, no post available.</p>
			                  </div>';
                endif;
            ?>
            
        </div>
    </div>
    <!-- <div class="container text-center mt-20">
        <a class="btn btn-loadmore">Artikel Lainnya</a>
    </div> -->
</section>
<?php get_footer(); ?>        	