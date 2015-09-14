<?php
include_once( 'library/pagination.php' );     //Pagination functions library

require('ar-teks/ar-teks.php');

add_action( 'after_setup_theme', 'initial_setup' );
if ( ! function_exists( 'initial_setup' ) ) {
    function initial_setup() {
    
        // Add default posts and comments RSS feed links to <head>.
        add_theme_support('automatic-feed-links');
            
        // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
        add_theme_support('post-thumbnails');
            
        // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
        //set_post_thumbnail_size(80, 80, true);
        add_image_size( 'featured', 640, 250, true);
        add_image_size( 'header-image', 1366, 800);
        //add_image_size( 'attachment', 1000, 750);
        //add_image_size( 'thumb-mini', 60, 60, true);
        
        //add_theme_support( 'custom-background' );
    }
}

function register_my_menus() {
  register_nav_menus(
    array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 */
function galausehat_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
        $title = "$title $sep " . sprintf( __( 'Page %s', 'galausehat' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'galausehat_wp_title', 10, 2 );



/**
 * Enqueue scripts and styles for the front end.
 *
 */
function galausehat_scripts() {

    // Load our main stylesheet.
    wp_enqueue_style( 'galausehat-style', get_stylesheet_uri(), false, null);
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', false, null, true);
    
    wp_enqueue_script( 'galausehat-bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'galausehat-headroom', get_template_directory_uri() . '/js/headroom.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'galausehat-headroom-jquery', get_template_directory_uri() . '/js/jquery.headroom.min.js', array( 'galausehat-headroom' ), null, true );
    
    //if ( is_home() || is_search() || is_author() || is_archive() ) {
        wp_enqueue_script( 'galausehat-infinite-scroll', get_template_directory_uri() . '/js/min/infinite-scroll-min.js', array( 'jquery' ), null, true );
    //}
    
    wp_enqueue_script( 'galausehat-script', get_template_directory_uri() . '/js/min/all-min.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'galausehat_scripts' );

/**
 * infinite scroll.
 *
 */

function galausehat_jetpack_setup() {
    add_theme_support( 'infinite-scroll', array(
        'type'           => 'scroll',
        'container'      => 'posto',
        'wrapper'        => true,
        'render'         => 'galausehat_popular_infinite_scroll_render',
    ) );
}
add_action( 'after_setup_theme', 'galausehat_jetpack_setup' );

function galausehat_custom_infinite_more() { 
if ( is_home() || is_archive() ) {
?>
    <script type="text/javascript">
    infiniteScroll.settings.text = "Artikel Lainnya";
    </script>
<?php }
}
add_action( 'wp_footer', 'galausehat_custom_infinite_more', 10 );

function galausehat_popular_infinite_scroll_render() {
        // start - guna default dulu, sbb custom popular tak jadi.
       if ( have_posts() ) :
                    while ( have_posts() ): the_post();
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
                    endwhile; ?>
                <?php endif;
                ?>

   <?php wp_reset_postdata();
    // end
}

/**
 * Get gravatar url
 *
 */
function get_gravatar_url( $email, $dimension ) {

    $hash = md5( strtolower( trim ( $email ) ) );
    return 'http://gravatar.com/avatar/' . $hash . '?s=' .$dimension;
}


/**
 * Modify Read More text
 *
 */
function galausehat_modify_read_more_link() {
    return '...';
}
add_filter( 'the_content_more_link', 'galausehat_modify_read_more_link' );


/**
 * Modify Exceprt Read More text
 *
 */
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more'); 


/**
 * Modify Excerpt Length
 *
 */
function custom_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Estimate time required to read the article
 *
 */
function galausehat_estimated_reading_time( $wpm = 120 ) {
    
    global $post;
    $content = strip_tags($post->post_content);     
    $content_words = str_word_count($content);
    $estimated_minutes = floor($content_words / $wpm);
    
    $result = '';

    if ($estimated_minutes < 1)
        $result .= " ".__('Kurang seminit pembacaan', 'galausehat');
    else if ($estimated_minutes > 60) {
        if ($estimated_minutes > 1440)
            $result .= " ".__('Lebih dari sehari pembacaan', 'galausehat');
        else
            $result .= floor($estimated_minutes / 60)." ". __('jam pembacaan', 'galausehat');
    }
    else if ($estimated_minutes == 1)
        $result .= $estimated_minutes." ". __('minit pembacaan', 'galausehat');
    else
        $result .= $estimated_minutes." ". __('minit pembacaan', 'galausehat');

    return $result;

}


/**
 * Add img-responsive class to image in content
 *
 */
function galausehat_add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'galausehat_add_image_responsive_class');


/**
 * Add extra social fields to user profile
 *
 */
function galausehat_add_contactmethod( $contactmethods ) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    // Add Facebook
    $contactmethods['facebook'] = 'Facebook';
    // Add Instagram
    $contactmethods['instagram'] = 'Instagram';
    
    // Remove Yahoo IM
    unset($contactmethods['yim']);
    unset($contactmethods['aim']);

    return $contactmethods;
}
add_filter('user_contactmethods','galausehat_add_contactmethod',10,1);


/**
 * Related Posts
 *
 */
function galausehat_related_posts( $post_id, $count=6 ){
    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }
    // get tags from current post
    $tags = wp_get_post_tags($post_id);
    
    foreach($tags as $tag_item) {
        $tag_array_name_list[] = $tag_item->slug;
    }

    if (empty($related_post)) {
         $query = array (
                    'posts_per_page' => $count,
                    'post_type' => 'post',
                    'tag_slug__in' => $tag_array_name_list,
                    'post__not_in' => array ($post_id),
                    'ignore_sticky_posts' => true,
                    'paged'                 => $paged  
                );
        $related_post = new WP_Query($query);
        
        // if no related posts
        if(!$related_post->have_posts()){

             $query = array (
                        'posts_per_page' => $count,
                        'post_type' => 'post',
                        'post__not_in' => array ($post_id),
                        'ignore_sticky_posts' => true,
                        'paged'                 => $paged  
                    );
            $related_post = new WP_Query($query);
            
            echo('no related');
        }

        if($related_post->have_posts()):    
            while($related_post->have_posts()) : $related_post->the_post();
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

        wp_reset_postdata();
    }
}
 // not call - original post - removed post count - use default wp setting.
function galausehat_author_all_posts($author_id, $pos = 'all') {
    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }
    if ($pos == 'terkini') :

        $query    = array(
                        'author'                => $author_id,
                        'post_type'             => 'post',
                        'orderby'               => 'post_date',
                        'order'                 => 'DESC',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged  
                    );

    elseif ($pos == 'popular') :

        $time = 'all';
        $query    = array(
                        'author'                => $author_id,
                        'post_type'             => 'post',
                        'meta_key'              => '_count-views_'.$time,
                        'orderby'               => 'meta_value_num',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged  
                    );

    else :

        $query    = array(
                        'author'                => $author_id,
                        'post_type'             => 'post',
                        'orderby'               => 'post_date',
                        'order'                 => 'DESC',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged  
                    );
    endif;

    $allpost = new WP_Query( $query );

    if ( $allpost->have_posts() ) :
        while ( $allpost->have_posts() ): $allpost->the_post();
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
    
    wp_reset_postdata();
}



/**
 * Featured Posts
 *
 */
function galausehat_featured_posts() {

    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }

    $query    = array(
                    'posts_per_page'        => 3,
                    'post_type'             => 'post',
                    'category_name'         => 'featured',
                    'ignore_sticky_posts'   => true
                );
    $featured = new WP_Query( $query );
    
    $count = 1;

    if ( $featured->have_posts() ) :
        while ( $featured->have_posts() ): $featured->the_post();
            //$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured' );
            $url = catch_post_image(true, $post->ID, $post->post_content, 'featured');
            $ctgr = get_the_category($post->ID);
            if ($count == 1) :
            ?>
                <div class="grid col-md-12 col-sm-12">
                    <article class="card">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="featured">
                            <div class="cover" style="background-image: url(<?php echo $url; ?>);"></div>
                            <div class="caption">
                                <?php the_title( '<h1>', '</h1>' ); ?>                 
                                <div class="meta pb-20">
                                    Oleh <?php the_author(); ?>
                                    &middot;
                                    <?php echo get_the_date( get_option( 'date_format' ) ); ?>
                                </div>
                            </div>
                        </a>
                        <div class="category"><?php $ctgr = get_the_category(); $ctgr = $ctgr[1]; echo '<a href="' . get_bloginfo('url') . '/category/' . $ctgr->category_nicename . '">'; echo $ctgr->cat_name; echo  '</a>'; ?></div>
                    </article>
                </div>
            <?php
            else :
            ?>
                <div class="grid col-md-6 col-sm-6">
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
                        <div class="category"><?php $ctgr = $ctgr[1]; echo '<a href="' . get_bloginfo('url') . '/category/' . $ctgr->category_nicename . '">'; echo $ctgr->cat_name; echo  '</a>'; ?></div>
                    </article>
                </div>
		    <?php
            endif;
            $count += 1;
        endwhile;
    endif;
    wp_reset_postdata();
}

// not call - original post - removed post count - use default wp setting. - Ahmad Rushdi
function galausehat_all_posts($pos = 'all') {
    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }
    if ($pos == 'terkini') :

        $query    = array(
                        'post_type'             => 'post',
                        'orderby'               => 'post_date',
                        'order'                 => 'DESC',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged   
                    );

    elseif ($pos == 'popular') :

        $time = 'all';
        $query    = array(
                        'post_type'             => 'post',
                        'meta_key'              => '_count-views_'.$time,
                        'orderby'               => 'meta_value_num',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged
                    );

    else :

        $query    = array(
                        'post_type'             => 'post',
                        'orderby'               => 'post_date',
                        'order'                 => 'DESC',
                        'ignore_sticky_posts'   => true,
                        'paged'                 => $paged
                    );
    endif;

    $allpost = new WP_Query( $query );

    if ( $allpost->have_posts() ) :
        while ( $allpost->have_posts() ): $allpost->the_post();
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

    wp_reset_postdata();
}


/**
 * Set Post's Featured Image as #belakang background-image
 *
 */
function galausehat_set_header_image() {
    global $post;
    
    if ( is_single() ) :
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured' );
        return $url = $thumb['0'];
    else:
        return;
    endif;
}



/**
 * Set Post view counts
 *
 */
add_action('wp_ajax_view_count','view_count');
add_action('wp_ajax_nopriv_view_count','view_count');
function view_count($id) {
	global $wpdb;
	$postid = intval( $_POST['id'] );
	$origin = $_SERVER['HTTP_ORIGIN'];
	$domain = network_site_url();
	
	//if ($origin==$domain) {	
		$timings = array( 'all'=>'', 'day'=>'Ymd', 'week'=>'YW', 'month'=>'Ym', 'year'=>'Y' );
		
		$time_to_go = 0; // Default: no time between count 
		if( (int)$time_to_go == 0 ) {
			foreach( $timings as $time=>$date )
			{
				if( $time != 'all' ) {
					$date = '-' . date( $date );
				}
				// Filtered meta key name
				//$meta_key_filtered = apply_filters( 'baw_count_views_meta_key', '_count-views_' . $time . $date, $time, $date );
				
				$meta_key = '_count-views_' . $time . $date;
				
				$count = (int)get_post_meta( $postid, $meta_key, true );
				$count = $count + 3;
				update_post_meta( $postid, $meta_key, $count );
			}
		}
	//}
	
	print_r($_POST);
	
	die();
}



/**
 * Grab Post's featured image or image in content
 *
 */
function catch_post_image( $return = false, $id = '', $content = '', $size = 'header-image' ) {
	global $post;
	if ($id=='') {
		$id = get_the_ID();
	}
	if ($content=='') {
		$content = $post->post_content;
	}
	if ( has_post_thumbnail($id) ) {
		$post_thumbnail_id = get_post_thumbnail_id($id);
		$img = wp_get_attachment_image_src( $post_thumbnail_id, $size );
		if(!$return){
			echo $img[0];
		} else {
			return $img[0];
		}
	} else {
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
		if($output!=''){
			if(!$return){
				echo $matches[1][0];
			} else {
				return $matches[1][0];
			}
		} else {
			if(!$return){
				//echo get_template_directory_uri().'/images/small_steps/small_steps.png';
			} else {
				//return get_template_directory_uri().'/images/small_steps/small_steps.png';
			}
		}
	}
}



/**
 * Register custom post_type: Blog
 *
 */
function create_post_type() {
	register_post_type( 'blog',
		array(
			'labels' => array(
				'name' => 'Blogs',
				'singular_name' => 'Blog',
				'all_items' => 'All Blogs',
				'add_new' => 'Add new Blog',
				'edit_item' => 'Edit Blog',
				'new_item' => 'New Blog',
				'view_item' => 'View Blog',
				'search_items' => 'Search Blog',
				'not_found' => 'No Blog found',
				'not_found_in_trash' => 'No Blog found in Trash'
			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'rewrite' => array('slug' => 'blog', 'with_front' => false),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author'),
		'taxonomies' => array('category', 'post_tag'),
		)
	);
}
add_action( 'init', 'create_post_type' );



/**
 * Register Meta-Box-Class: Posts.
 *
 */
if ( is_admin() ) {
	//include the main class file
	require_once("library/meta-box-class/my-meta-box-class.php");
	
	$prefix = 'galausehat_';	
	
	// Add video meta
	$config = array(
		'id' => $prefix.'posts',				// meta box id, unique per meta box
		'title' => 'More Configurations',		// meta box title
		'pages' => array('post'),				// post types, accept custom post types as well, default is array('post'); optional
		'context' => 'normal',					// where the meta box appear: normal (default), advanced, side; optional
		'priority' => 'high',					// order of meta box: high (default), low; optional
		'fields' => array(),					// list of meta fields (can be added by field arrays)
		'local_images' => false,				// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => true				// change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);
	/* Initiate your meta box */
	$meta_video =  new AT_Meta_Box($config);
    $meta_video->addCheckbox($prefix.'post_header_enable',array('name'=> 'Enable Header Image') );
	$meta_video->addColor($prefix.'post_title_color', array('name'=> 'Title Custom Color') );
	$meta_video->addColor($prefix.'post_excerpt_color', array('name'=> 'Sub Title (Excerpt) Custom Color') );
	$meta_video->Finish();
	
}


function header_post_title() {
    global $wpdb;
    if ( is_single() ) {
        $meta = get_post_meta( get_the_ID() );
        
        if ( $meta['galausehat_post_header_enable'][0] ) {
            echo "\n\n<style>\n.single #header { min-height:100%; }\n";
            echo ".single #belakang, .page #belakang { background-color: transparent; }\n";
            
            if ( $meta['galausehat_post_title_color'][0]<>'#' ) {
                echo ".header--post-title h1 { color:". $meta['galausehat_post_title_color'][0] ."; }\n";
            } else {
                echo ".header--post-title h1 { color: #ffffff; }\n";
            }
            
            if ( $meta['galausehat_post_excerpt_color'][0]<>'#' ) {
                echo ".header--post-title p { color:". $meta['galausehat_post_excerpt_color'][0] ."; }\n";
            } else {
                echo ".header--post-title p { color: #ffffff; }\n";
            }
            
            echo ".entry-title { display:none; }\n";
            echo "</style>\n\n";
        }
        
    }
}
add_action('wp_head', 'header_post_title');


function header_homepage_css() {
    global $wpdb;
    if ( is_home() && of_get_option('header_background_enable') ) {
        echo "\n\n<style>\n";
        echo ".home #header h1 { color:" . of_get_option('header_title_color') . "; }\n";
        echo ".home #header h2 { color:" . of_get_option('header_tagline_color') . "; }\n";
        echo ".home #header h3 { color:" . of_get_option('header_tagline_color') . "; }\n";
        echo ".home #header .btn-nav { background-color:" . of_get_option('header_button_bg') . "; color:" . of_get_option('header_button_color') . "; border-color:" . of_get_option('header_button_border_color') . ";  }\n";
        echo ".home #header .btn-nav:hover { background-color:" . of_get_option('header_button_bg_hover') . "; color:" . of_get_option('header_button_color_hover') . "; }\n";
        echo "</style>\n\n";   
    }
}
add_action('wp_head', 'header_homepage_css');

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_filter( 'infinite_scroll_credit', 'galausehat_filter_jetpack_credit' );
 
function galausehat_filter_jetpack_credit() {
return '<a href="http://GalauSehat.id/">GalauSehat.ID - Ide dan Inspirasi</a>';
}