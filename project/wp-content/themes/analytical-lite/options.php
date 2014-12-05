<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {
	global $shortname;
	global $themename;
	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
	//setting contact us page
	if(sketch_get_option($shortname.'_contact_page'))
		select_template(sketch_get_option($shortname.'_contact_page'));
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'analytical'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {
	global $shortname;
	global $themename;
	
	// set  pages
		$options_pages = array();
		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
		$options_pages[''] = 'Select a page:';

		foreach ($options_pages_obj as $page) {
			$options_pages[$page->ID] = $page->post_title;
		}
	// layout structure
	$layout_struc = array(
		'ls_top' => __('Top Header', 'analytical'),
		'ls_left' => __('Left Header', 'analytical')
	);
	// Gmap View
	$gmap_view = array(
		'm' => __('Map View', 'analytical'),
		'k' => __('Satellite View', 'analytical'),
		'h' => __('Hybrid View', 'analytical'),
		'p' => __('Terrain View', 'analytical')
	);
	// pagination
	$test_pagiarray = array(
		1 => __('Yes', 'analytical'),
		0 => __('No', 'analytical')
	);
	//Front page layout Show/hide
	$frontpagelayout_array = array(
		'true' => __('Static Layout', 'analytical'),
		'false' => __('Custom Layout', 'analytical')
	);
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	$options = array();
	//General Settings
	$options[] = array(
		'name' => __('General Settings', 'analytical'),
		'type' => 'heading');
		$options[] = array(
			'name' => __('Layout Structure', 'analytical'),
			'desc' => __('Default Structure option "Top".', 'analytical'),
			'id' => $shortname.'_layout_struc',
			'std' => 'ls_left',
			'type' => 'radio',
			'options' => $layout_struc);
		$options[] = array(
			'name' => __('Base Color', 'analytical'),
			'desc' => __('Change the base color.', 'analytical'),
			'id' => $shortname.'_base_color',
			'std' => '#00a6ff',
			'type' => 'color' );
		$options[] = array(
			'name' => __('Base Color 2', 'analytical'),
			'desc' => __('Change the base color 2.', 'analytical'),
			'id' => $shortname.'_base_color2',
			'std' => '#b4eafa',
			'type' => 'color' );
		$options[] = array(
			'name' => __('Change Logo (full path to logo image " 240px into 78px ")', 'analytical'),
			'desc' => __('This creates a Custom logo that previews the image.', 'analytical'),
			'id' => $shortname.'_logo_img',
			'std' => '',
			'type' => 'upload');		
		$options[] = array(
			'name' => __('Change Persistent header logo image (" 120px into 39px ")', 'analytical'),
			'desc' => __('This creates a Custom logo that previews the image.', 'analytical'),
			'id' => $shortname.'_flogo_img',
			'std' => '',
			'type' => 'upload');
		$options[] = array(
			'name' => __('Sidebar Contact Us Content ( for "Left Header" layout structure )', 'analytical'),
			'desc' => __('Enter Contact Us Content.', 'analytical'),
			'id' => $shortname.'_sconus_content',
			'std' => '(+40) 111 222 333<br />test@test.com<br />the address<br />city, state<br />',
			'type' => 'textarea');				
	    $options[] = array(
			'name' => __('Show Custom Pagination', 'analytical'),
			'desc' => __('Show custom pagination on pages.', 'analytical'),
			'id' => $shortname.'_show_pagenavi',
			'std' => 'yes',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $test_pagiarray);
		$options[] = array(
			'name' => __('Change favicon', 'analytical'),
			'desc' => __('This creates a Custom favicon that previews the image.', 'analytical'),
			'id' => $shortname.'_favicon',
			'std' => '',
			'type' => 'upload');
	//Navigation settings
	$options[] = array(
		'name' => __('Navigation Settings', 'analytical'),
		'type' => 'heading');
		$options[] = array(
			'name' => __('Navigation Even-item BG-Color', 'analytical'),
			'desc' => __('Change Even-item BG-Color.', 'analytical'),
			'id' => $shortname.'_nav_eitem',
			'std' => '#1d95cf',
			'type' => 'color' );		
		$options[] = array(
			'name' => __('Navigation Odd-item BG-Color', 'analytical'),
			'desc' => __('Change Odd-item BG-Color.', 'analytical'),
			'id' => $shortname.'_nav_oitem',
			'std' => '#75c6eb',
			'type' => 'color' );
		$options[] = array(
				'name' => __('Check to Enable persistent header navigation menu.', 'analytical'),
				'desc' => __('Enable persistent header navigation menu. <b>(<i>works with only "Top Header" Layout Structure.</i>)</b>', 'analytical'),
				'id' => $shortname.'_skenavfull',
				'type' => 'checkbox');	
	//Social links
	$options[] = array(
		'name' => __('Social links', 'analytical'),
		'type' => 'heading');
		$options[] = array(
			'name' => __('Facebook Link', 'analytical'),
			'desc' => __('Enter Facebook Link.', 'analytical'),
			'id' => $shortname.'_fbook_link',
			'std' => '#',
			'type' => 'text');
		$options[] = array(
				'name' => __('Twitter link', 'analytical'),
				'desc' => __('Enter Twitter link.', 'analytical'),
				'id' => $shortname.'_twitter_link',
				'std' => '#',
				'type' => 'text');
		$options[] = array(
				'name' => __('Google plus Id', 'analytical'),
				'desc' => __('Enter Google plus Id.', 'analytical'),
				'id' => $shortname.'_gplus_link',
				'std' => '#',
				'type' => 'text');
		$options[] = array(
			'name' => __('Youtube Link', 'analytical'),
			'desc' => __('Enter Youtube Link.', 'analytical'),
			'id' => $shortname.'_ytube_link',
			'std' => '#',
			'type' => 'text');	
		$options[] = array(
			'name' => __('Pinterest Link', 'analytical'),
			'desc' => __('Enter Pinterest Link.', 'analytical'),
			'id' => $shortname.'_pint_link',
			'std' => '#',
			'type' => 'text');	
		$options[] = array(
			'name' => __('Dribble Link', 'analytical'),
			'desc' => __('Enter Dribble Link.', 'analytical'),
			'id' => $shortname.'_drib_link',
			'std' => '#',
			'type' => 'text');				
		$options[] = array(
			'name' => __('Wordpress Link', 'analytical'),
			'desc' => __('Enter Wordpress Link.', 'analytical'),
			'id' => $shortname.'_wordp_link',
			'std' => '#',
			'type' => 'text');	
			
	//Contact Page Options	

		$options[] = array(
			'name' => __('Contact Page Options', 'analytical'),
			'type' => 'heading');
			
							
		//select contact page template
		$options[] = array(
				'name' => __('Select Contact us page', 'analytical'),
				'desc' => __('Contact us page', 'analytical'),
				'id' => $shortname.'_contact_page',
				'type' => 'select',
				'options' => $options_pages);
				
				$contact_form_7_description = '';
				$contact_form_7 = admin_url('update.php?action=install-plugin&plugin=contact-form-7&_wpnonce=').wp_create_nonce('install-plugin_contact-form-7');
				$config_contact_form_7 = admin_url('admin.php?page=wpcf7');
				$activate_contact_form_7 = admin_url('plugins.php?action=activate&plugin=contact-form-7%2Fwp-contact-form-7.php&_wpnonce=').wp_create_nonce('activate-plugin_contact-form-7/wp-contact-form-7.php');
				
				if(is_dir( WP_PLUGIN_DIR.'/contact-form-7/')){
					include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){ $contact_form_7_description = 'Click Here to <a target="_blank" href="'.$config_contact_form_7.'"> Configure Contact Form 7 </a> Plugin to show contact form on your <b>Contact Page</b>.'; }
					else{$contact_form_7_description = 'Click Here to <a target="_blank" href="'.$activate_contact_form_7.'"> Activate Contact Form 7 </a>Plugin.'; }
				}
				else{
					$contact_form_7_description = 'To use Contact Form, you need <a target="_blank" href="'.$contact_form_7.'">Contact Form 7 </a>plugin installed.';
				}
				
		$options[] = array(
			'name' => __('Contact Form Info', 'options_framework_theme'),
			'desc' => $contact_form_7_description,
			'type' => 'info');
	//Footer	
	$options[] = array(
		'name' => __('Footer', 'analytical'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Copyright Text', 'analytical'),
		'desc' => __('You can use HTML for links etc..', 'analytical'),
		'id' => $shortname.'_copyright',
		'std' => '<span class="ana-copy">Copyright Text Here.</span>',
		'type' => 'textarea');

	//Footer Sidebars	
	$options[] = array(
		'name' => __('Footer Sidebar Names', 'analytical'),
		'type' => 'heading');
		//Sidebar 1
		$options[] = array(
			'name' => __('First Sidebar Title:', 'analytical'),
			'desc' => __('Leave it blank, if you want to disable it.', 'analytical'),
			'id' => $shortname.'_sidebar1_title',
			'std' => 'Creative',
			'type' => 'text');
		//Sidebar 2
		$options[] = array(
			'name' => __('Second Sidebar Title:', 'analytical'),
			'desc' => __('Leave it blank, if you want to disable it.', 'analytical'),
			'id' => $shortname.'_sidebar2_title',
			'std' => 'Services',
			'type' => 'text');
		//Sidebar 3
		$options[] = array(
			'name' => __('Third Sidebar Title:', 'analytical'),
			'desc' => __('Leave it blank, if you want to disable it.', 'analytical'),
			'id' => $shortname.'_sidebar3_title',
			'std' => 'Clients',
			'type' => 'text');
	//Front Page Options	
	$options[] = array(
		'name' => __('Front Page Layout option', 'analytical'),
		'type' => 'heading');
	
	$options[] = array(
			'name' => __('Select Your Front Page Layout.', 'analytical'),
			'desc' => __('if you select Static layout for front page your selected page content is show otherwise custom front page layout show.', 'analytical'),
			'id' => $shortname.'_hide_frontlayout',
			'std' => 'true',
			'type' => 'radio',
			'options' => $frontpagelayout_array);
			
	$options[] = array(
		'name' => __('Front Page Gallery Captions', 'analytical'),
		'type' => 'heading');
		//Image 1
		$options[] = array(
			'name' => __('Image 1 Title:', 'analytical'),
			'desc' => __('Enter Image 1 Title.', 'analytical'),
			'id' => $shortname.'_sl1_title',
			'std' => 'Title 1',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 1 Content:', 'analytical'),
			'desc' => __('Enter Image 1 Content.', 'analytical'),
			'id' => $shortname.'_sl1_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');
		//Image 2
		$options[] = array(
			'name' => __('Image 2 Title:', 'analytical'),
			'desc' => __('Enter Image 2 Title.', 'analytical'),
			'id' => $shortname.'_sl2_title',
			'std' => 'Title 2',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 2 Content:', 'analytical'),
			'desc' => __('Enter Image 2 Content.', 'analytical'),
			'id' => $shortname.'_sl2_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');
		//Image 3
		$options[] = array(
			'name' => __('Image 3 Title:', 'analytical'),
			'desc' => __('Enter Image 3 Title.', 'analytical'),
			'id' => $shortname.'_sl3_title',
			'std' => 'Title 3',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 3 Content:', 'analytical'),
			'desc' => __('Enter Image 3 Content.', 'analytical'),
			'id' => $shortname.'_sl3_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');
		
	//Front Page Options	
	$options[] = array(
		'name' => __('Front Page Video Caption', 'analytical'),
		'type' => 'heading');
		//Image 1
		$options[] = array(
			'name' => __('Video Title:', 'analytical'),
			'desc' => __('Enter Video Title.', 'analytical'),
			'id' => $shortname.'_fvd_title',
			'std' => 'This is video title',
			'type' => 'text');
		$options[] = array(
			'name' => __('Video Description:', 'analytical'),
			'desc' => __('Enter Video Description.', 'analytical'),
			'id' => $shortname.'_fvd_descp',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');	

	
	//Gallery Page Options	
	$options[] = array(
		'name' => __('Gallery Page Image Captions', 'analytical'),
		'type' => 'heading');
		//Image 1
		$options[] = array(
			'name' => __('Image 1 Title:', 'analytical'),
			'desc' => __('Enter Image 1 Title.', 'analytical'),
			'id' => $shortname.'_gsl1_title',
			'std' => 'Gallery image-1 title',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 1 Content:', 'analytical'),
			'desc' => __('Enter Image 1 Content.', 'analytical'),
			'id' => $shortname.'_gsl1_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');
		//Image 2
		$options[] = array(
			'name' => __('Image 2 Title:', 'analytical'),
			'desc' => __('Enter Image 2 Title.', 'analytical'),
			'id' => $shortname.'_gsl2_title',
			'std' => 'Gallery image-2 title',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 2 Content:', 'analytical'),
			'desc' => __('Enter Image 2 Content.', 'analytical'),
			'id' => $shortname.'_gsl2_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');
		//Image 3
		$options[] = array(
			'name' => __('Image 3 Title:', 'analytical'),
			'desc' => __('Enter Image 3 Title.', 'analytical'),
			'id' => $shortname.'_gsl3_title',
			'std' => 'Gallery image-3 title',
			'type' => 'text');
		$options[] = array(
			'name' => __('Image 3 Content:', 'analytical'),
			'desc' => __('Enter Image 3 Content.', 'analytical'),
			'id' => $shortname.'_gsl3_content',
			'std' => 'Lorem ipsum dolor sit amet,  sectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
			'type' => 'textarea');			
	return $options;
}
/*
* This is an example of how to add custom scripts to the options panel..
*/
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
function optionsframework_custom_scripts() { ?>
<?php
}