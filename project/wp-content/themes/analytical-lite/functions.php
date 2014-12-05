<?php
//	Registers the Widgets and Sidebars for the site
function ana_widgets_init() {
	register_sidebar(array(
		'name' => 'blog-sidebar-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'footer-first-sidebar-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'footer-second-sidebar-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'footer-third-sidebar-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'ana_widgets_init' );

/***************register nav menus*********************/
function ana_nav_menus_call() {
	register_nav_menus( array(
		'Header' => __( 'Primary Navigation','analytical'),
	));
}
add_action( 'after_setup_theme', 'ana_nav_menus_call' ); 

/***** Make theme available for translation ****/
// Translations can be filed in the /lang/ directory

function ana_lang_setup(){
	load_theme_textdomain('analytical', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'ana_lang_setup');

/**
* Funtion to add CSS class to body
*/
function ana_add_class( $classes ) {

		global $shortname;
		
	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
		if(is_page_template('template-gallery.php')){ $skeGtemp = "skegallery"; } else{ $skeGtemp = "";}
	    $classes = array(sketch_get_option($shortname.'_layout_struc'),$skeGtemp,'analytical-lite');
	return $classes;
}
add_filter( 'body_class','ana_add_class' );


/*  * Loads the Options Panel * * If you're loading from a child theme use stylesheet_directory * instead of template_directory */ 
if ( !function_exists( 'optionsframework_init' ) ){	
	//Theme Shortname	
	$shortname = 'analytical-lite';	
	$themename='Analytical Lite Theme';	
	define( 'OPTIONS_FRAMEWORK_DIRECTORY',get_template_directory_uri() . '/SketchBoard/includes/' );	
	require_once get_template_directory() . '/SketchBoard/includes/options-framework.php';	
	require_once get_template_directory() . '/SketchBoard/functions/admin-init.php';
	require ( get_template_directory() . '/SketchBoard/includes/sketchtheme-upsell.php' );
}