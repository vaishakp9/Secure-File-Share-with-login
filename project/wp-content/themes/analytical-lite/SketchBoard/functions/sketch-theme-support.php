<?php
global $themename;
global $shortname;
function ana_nav() 
{
   	if( has_nav_menu( 'Header' ) ) {
		wp_nav_menu(array( 'container_class' => 'menu', 'container_id' => 'menu-container', 'menu_id' => 'menu-main','theme_location' => 'Header' )); 
	} 
	else                 
    ana_nav_fallback();
}
function ana_nav_fallback() {
    ?>
    <div class="menu" id="menu-container">
        <ul id="menu-main" class="">
            <?php wp_list_pages('title_li=&depth=0'); ?>
        </ul>
    </div>  
<?php
}
/**
 * Filter content with empty post title
 *
 * @since analytical
 */
add_filter('the_title', 'ana_untitled');
function ana_untitled($title) {
	if ($title == '') {
		return __('Untitled', 'analytical');
	} else {
		return $title;
	}
}
/********************************************
 THUMBNAIL SUPPORT
*********************************************/
function ana_theme_support(){
    add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 150, 150, true );
	add_editor_style();
}
add_action('after_setup_theme', 'ana_theme_support');
add_action( 'after_setup_theme', 'ana_theme_thumbs_setup' );
function ana_theme_thumbs_setup() {
    if ( function_exists( 'add_theme_support' ) ) {
		add_image_size( 'ske_post_thumb', 565, 210,false);
    }
}
