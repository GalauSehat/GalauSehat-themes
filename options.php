<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Homepage', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Enable Header Background', 'options_check'),
		'desc' => __('Check to enable.', 'options_check'),
		'id' => 'header_background_enable',
		'std' => '0',
		'type' => 'checkbox');
		
    $options[] = array(
		'name' => __('Default Header Background', 'options_check'),
		'desc' => __('Upload default header background image.', 'options_check'),
		'id' => 'header_background_default',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Header Title Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_title_color',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Header Tagline Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_tagline_color',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Header Button Background Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_button_bg',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Header Button Text Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_button_color',
		'std' => '#999999',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Header Button Border Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_button_border_color',
		'std' => '#c0c0c0',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Header Button Hover Background Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_button_bg_hover',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Header Button Hover Text Color', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'header_button_color_hover',
		'std' => '',
		'type' => 'color' );
		
    $options[] = array(
		'name' => __('Popular Posts', 'options_check'),
		'type' => 'heading');
		
    $options[] = array(
		'name' => __('Post Counts', 'options_check'),
		'desc' => __('Total posts display under Popular Posts listing.', 'options_check'),
		'id' => 'popular_post_count',
		'std' => '10',
		'type' => 'text');  
    
    $options[] = array(
		'name' => __('Socials', 'options_check'),
		'type' => 'heading');

    $options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('Full Facebook URL. (with http://)', 'options_check'),
		'id' => 'social_url_facebook',
		'std' => 'https://www.facebook.com',
		'type' => 'text');

    $options[] = array(
		'name' => __('Twitter', 'options_check'),
		'desc' => __('Full Twitter URL. (with http://)', 'options_check'),
		'id' => 'social_url_twitter',
		'std' => 'https://twitter.com',
		'type' => 'text');
		
    $options[] = array(
		'name' => __('Instagram', 'options_check'),
		'desc' => __('Full Instagarm URL. (with http://)', 'options_check'),
		'id' => 'social_url_instagram',
		'std' => 'https://instagram.com',
		'type' => 'text');

	return $options;
}