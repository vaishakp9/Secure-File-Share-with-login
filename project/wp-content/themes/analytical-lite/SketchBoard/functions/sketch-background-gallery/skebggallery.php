<?php
include_once('skebg_defaults.php');
include_once('inc/admin/skebg_admin.php');
include_once('inc/front/skebg_front.php');
include_once('scripts.php');
define('SKETCHBGSURL', get_template_directory_uri() . '/images/sketchbg/');
define('SKETCHBGSSCRIPT', get_template_directory_uri() . '/SketchBoard/functions/sketch-background-gallery/inc/');
//-- MAIN ADMIN MENU OPTIONS -------------------------------------
//----------------------------------------------------------------
add_action('admin_menu', 'skebggallery_plugin_admin_menu');
function skebggallery_plugin_admin_menu() {
	add_theme_page('Sketch Background Gallery Page', 'Analytical Lite Gallery', 'administrator', 'skebggallery', 'skebggallery_backend_menu');
}
add_action('admin_init', 'skebg_main_init');
function skebg_main_init(){
	register_setting('skebg_gallery_options', 'skebggallery_options', 'skebg_validate_options');
}
function skebggallery_defaults(){
	$default = array(
	'skebg_allpg' => 1,
	'skebg_time' =>'6',
	'skebg_transition'=> '1',
	'skebg_nav'=> 1,
	'skebg_playpause'=> 1,
	'skebg_thumbs'=> 1,
	'skebg_thumbs_display'=> 'square',
	'skebg_random' => 0,
	'skebg_overlay'=> 1,
	'skebg_bgchkbox'=> 0,
	'skebg_bgcolor'=>'#111',
	'skebg_bgvdochk'=> 0,
	'skebg_bgvdourl'=> 'http://www.youtube.com/watch?v=e4Is32W-ppk',
	'skebg_bgvdrept'=> 1,
	'skebg_slide1' => SKETCHBGSURL.'splashing-165192_1280.jpg',
	'skebg_slide2' => SKETCHBGSURL.'orange-165040_1280.jpg',
	'skebg_slide3' => SKETCHBGSURL.'orange-164985_1280.jpg'
	);
return $default;
}
function skebggallery_install(){
	$optionExists = get_option('skebggallery_options');
	if(!$optionExists)
    add_option('skebggallery_options', skebggallery_defaults());
}
add_action( 'after_setup_theme', 'skebggallery_install' );
add_action('wp_ajax_skebg_saved' ,'skebg_sett_saved');
function skebg_sett_saved(){
	check_ajax_referer('skebggallery-options-data', 'security');
	$data = $_POST;
	unset($data['security'], $data['action']);
	$data_arr = $data['skebggallery_options'];
	if(update_option('skebggallery_options', $data_arr)){
		die('1');
	} else {
		die('0');
	}
}
//-----------------------------------------------------------------------------------
?>