<?php
global $themename;
global $shortname;
/************************************************
*  enquque css and javascript
************************************************/
//enqueue jquery 
function ana_script_enqueqe() {
	global $shortname;
	if(!is_admin())
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'comment-reply' );    
	}
}
add_action('wp_enqueue_scripts', 'ana_script_enqueqe');

//enqueue admin css
function ana_theme_stylesheet(){
global $themename;
global $shortname;
if ( !is_admin() ) {
	global $wp_version;
		$skt_version = NULL;
		$theme = wp_get_theme();
		$skt_version = $theme['Version'];
	wp_enqueue_script('ana_jquery_easing',get_bloginfo('template_directory').'/js/jquery.easing.1.3.js',array('jquery'),'1.3.0' );
	wp_enqueue_script('ana_colorboxsimple_slide',get_bloginfo('template_directory').'/js/jquery.prettyPhoto.js',array('jquery'),'1.0' );
	wp_enqueue_script('ana_custom_slide',get_bloginfo('template_directory').'/js/custom.js',array('jquery'),'1.0' );
	wp_enqueue_script('ana_ddsmoothmenusimple_slide',get_bloginfo('template_directory').'/js/ddsmoothmenu.js',array('jquery'),'1.0' );
	wp_enqueue_script('ana_stricky',get_bloginfo('template_directory').'/js/hcsticky.js',array('jquery'),'1.1.9' );

	wp_register_style( 'ana-typography-stylesheet', get_template_directory_uri().'/css/typography.css', false, $skt_version );
	wp_enqueue_style( 'ana-typography-stylesheet' );
	wp_register_style( 'ana-layout-stylesheet', get_template_directory_uri().'/css/layout.css', false, $skt_version );
	wp_enqueue_style( 'ana-layout-stylesheet' );
	wp_register_style( 'ana-style', get_stylesheet_uri(), false, $skt_version );
	wp_enqueue_style( 'ana-style' );
	
	wp_enqueue_style( 'ana-theme-default' );
	wp_register_style( 'prettyPhoto-theme-stylesheet', get_template_directory_uri().'/css/prettyPhoto.css', false, $skt_version );
	wp_enqueue_style( 'prettyPhoto-theme-stylesheet' );

	wp_register_style( 'googleFontsMerriweather' , 'http://fonts.googleapis.com/css?family=Merriweather+Sans:400,400italic,300,300italic' );
	wp_enqueue_style( 'googleFontsMerriweather' );
	}
}
add_action('wp_enqueue_scripts', 'ana_theme_stylesheet');

function ana_head_custom(){
global $shortname;
	if(!is_admin())
	{
		require_once(get_template_directory().'/inc/analytical_custom.php');
	}   
}
add_action('wp_head', 'ana_head_custom',10);

function ana_head()
{
	global $shortname;
	$skt_favicon = "";
	$skt_meta  = '<meta name="viewport" content="width=device-width" />'."\n";
   	if(sketch_get_option($shortname.'_favicon')){
		$skt_favicon = sketch_get_option($shortname.'_favicon','analytical');
		$skt_meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$skt_favicon\"/>\n";
	}
	echo $skt_meta;
}
add_action('wp_head', 'ana_head');

function ana_footer()
{
	global $shortname;
	if(is_page_template('template-gallery.php')){ ?>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			show_skebg_thumbs();
		});
		</script>
	<?php } 
}

add_action('wp_footer', 'ana_footer');

