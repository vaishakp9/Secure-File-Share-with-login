<?php
global $themename;
global $shortname;
/***************** EXCERPT LENGTH *****************/
function ana_excerpt_length($length) {
	return 150;
}
add_filter('excerpt_length', 'ana_excerpt_length');
/***************** READ MORE *****************/
function ana_excerpt_more($more) {
	global $post;
	return ' [...]<div class="clearfix"><a class="post-readmore" href="'. get_permalink($post->ID) . '"></a></div>';
}
add_filter('excerpt_more', 'ana_excerpt_more');
/************* Custom Page Title ***********
*******************************************/
add_filter( 'wp_title', 'ana_title' );
function ana_title($title)
{
	$skt_title = $title;
	if ( is_home() && !is_front_page() ) {
		$skt_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$skt_title .=  get_bloginfo('name');
		$skt_title .= ' | '; 
		$skt_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$skt_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		$skt_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$skt_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$skt_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$skt_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$skt_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$skt_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$skt_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$skt_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$skt_title .= get_bloginfo('name');
		}					
	}
	return $skt_title;
}
/********************************************
 EXCERPT CONTROLL FUNCTION
*********************************************/
function ana_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
/*******************************************************************
***************************** pagination ***************************
********************************************************************/
/** Retrieve or display pagination code.
 *
 * Usage:
 * 
 * <?php if (function_exists("ana_pagenavi")) { ana_pagenavi(); } ?>
 * 
 */
function ana_paginate_loop($start, $max, $page = 0) 
{
    global $themename, $shortname;
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i)) 
            ? "<span class='$shortname-page $shortname-current'>$i</span>" 
            : "<a href='" . get_pagenum_link($i) . "' class='$shortname-page'>$i</a>";
    }
    return $output;
}

function ana_pagenavi($args = null) 
{
global $themename, $shortname;
    $defaults = array(
        'page' => null, 'pages' => null, 
        'range' => 3, 'gap' => 3, 'anchor' => 1,
        'before' => '<div id="'.$shortname.'-paginate">', 
		'after' => '<div class="clear"></div></div>',
        'title' => __('Pages', 'analytical'),
        'nextpage' => __('Next &rsaquo;', 'analytical'), 
		'previouspage' => __('&lsaquo; Previous', 'analytical'),
        'echo' => 1
    );
    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);
    if (!$page && !$pages) 
	{
        global $wp_query;
        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }
    $output = "";
    if ($pages > 1) 
	{    
        $output .= "$before<span class='$shortname-title'>$title</span>";
        $ellipsis = "<span class='$shortname-gap'>...</span>";
        if ($page > 1 && !empty($previouspage)) {
            $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='$shortname-prev'>$previouspage</a>";
        }
        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
        if ($left_gap && !$right_gap) 
		{
            $output .= sprintf('%s%s%s', 
                ana_paginate_loop(1, $anchor), 
                $ellipsis, 
                ana_paginate_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) 
		{
            $output .= sprintf('%s%s%s%s%s', 
                ana_paginate_loop(1, $anchor), 
                $ellipsis, 
                ana_paginate_loop($block_min, $block_high, $page), 
                $ellipsis, 
                ana_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) 
		{
            $output .= sprintf('%s%s%s', 
                ana_paginate_loop(1, $block_high, $page),
                $ellipsis,
                ana_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else 
		{
            $output .= ana_paginate_loop(1, $pages, $page);
        }
        if ($page < $pages && !empty($nextpage)) 
		{
            $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='$shortname-next'>$nextpage</a>";
        }
        $output .= $after;
    }
    if ($echo) 
	{
        echo $output;
    }
    return $output;
}

/******* theme check fix ***********/
if ( ! isset( $content_width ) ){
    $content_width = 900;
}

/**************************************************
*
*  Function for selecting contact us page
*
**************************************************/
function select_template($pg_id)
{
  //deleting previous postmeta
  global $wpdb;
  $wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key = '_wp_page_template' AND meta_value = 'contact-page.php'");
  //updating postmeta
  update_post_meta($pg_id, '_wp_page_template', 'contact-page.php');
}
/*********************************************
*
*   to check if a page template is active
*
*********************************************/
function is_pagetemplate_active($pagetemplate = '')
{
	global $wpdb;
	$sql = "select meta_key from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
	$result = $wpdb->query($sql);
	if ($result){
		return TRUE;
	}
	else{
		return FALSE;
	}
}
/***************************/
function ske_striptag($tag,$string){
    $string=preg_replace('/<'.$tag.'[^>]*>/i', '', $string);
    $string=preg_replace('/<\/'.$tag.'>/i', '', $string);
    return $string;
} 
/***************************/
function ana_header_stylingopt()
{
global $shortname;
?>
	<?php
		if(sketch_get_option($shortname.'_skenavfull','analytical')) {  ?>
		<script type="text/javascript">
			jQuery(document).ready(function() 
			{
				var div = jQuery('#skenav');
				var start = jQuery(div).offset().top;
				jQuery(window).scroll(function ()
				{
					if(jQuery('body.ls_top').length > 0 && jQuery(window).width() > 601)
					{
						var clrschm = jQuery('#clrschm').val();
						var winWdth = jQuery(window).width();
						var p = jQuery(window).scrollTop();
						var position_st = ((p)>start) ? 'fixed' : 'static';
						var pos_top = ((p)>start) ? '0px' : 'auto';
						var wdth = jQuery(window).width() + "px";
						var fullwidth = ((p)>start) ? '100%' : '100%';
						var bg = ((p)>start) ? '#000000' : 'transparent';
						var pos_left = ((p)>start) ? '0px' : 'auto';
						var bdrw_bot = ((p)>start) ? '2px' : '0px';
						var bdrs_bot = ((p)>start) ? 'solid' : 'none';
						var bdrc_bot = ((p)>start) ? clrschm : 'transparent';
						var box_shdow = ((p)>start) ? '0 2px 2px #000000' : 'none';
						var clrfix = ((p)>start) ? 'clearfix' : '';
						var totalWidth = 0;
						jQuery("#menu-main").children().each(function() {
							totalWidth = totalWidth + jQuery(this).outerWidth(true);
						});
						var flogoWdth = jQuery('#floating_logo').outerWidth(true);
						var outWdth = (totalWidth + flogoWdth);
						if((p)>start){jQuery('#nav_outerwrap').css({width:totalWidth+flogoWdth,margin:'0 auto'}).addClass(clrfix);}
						else{jQuery('#nav_outerwrap').css({width:'auto',margin:'0'});}
						var fontsz  = ((p)>start) ? '18px' : '21px';		
						jQuery('#skenav a').css('font-size',fontsz);
						jQuery('#floating_logo').css('display',((p)>start) ? 'block' : 'none');
						jQuery('body.ls_top div.head-toggle').css('display',((p)>start) ? 'none' : 'block');
						jQuery('#menu-container').css('float',((p)>start) ? 'left' : 'none');
						jQuery('#menu-container').css('float',((p)>start) ? 'left' : 'none');
						jQuery(div).css({
							'position' : position_st,
							'width' : fullwidth,
							'top' : pos_top,
							'left' : pos_left,
							'background-color' : bg,
							'margin' : '0 0 0px 0',
							'border-bottom-width' : bdrw_bot,
							'border-bottom-color' : bdrc_bot,
							'border-bottom-style' : bdrs_bot,
							'box-shadow' : box_shdow
						});
					}
				});
			});
		</script>
		<?php }
	?>
<?php } 
add_action('wp_footer','ana_header_stylingopt');