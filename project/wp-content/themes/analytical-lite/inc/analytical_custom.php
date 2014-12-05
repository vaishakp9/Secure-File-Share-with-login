<!-- custom code here -->
<?php
if(sketch_get_option($shortname.'_layout_struc')==='ls_left'){
	if(is_page_template('template-gallery.php'))
	$nav_orient = 'h';
	else
	$nav_orient = 'v';
}
elseif(sketch_get_option($shortname.'_layout_struc')==='ls_top')
$nav_orient = 'h';
?>
<style type="text/css">
.bc_clr,#skenav a:hover,.entry-title a:link, .entry-title a:visited,.cont_nav a,a:link,a:focus,a:hover,a,.pagenavi a, .pagenavi span.current, .pagenavi .single_page, .pagenavi span.pages,h3#comments-title,
h3#reply-title,h3#comments,.comment-meta a:link, .comment-meta a:visited,#skebggallery_cap .skebg_caption .skebg_title,.comment-author cite.fn{color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;}
.bc_bgclr,#footer-widget-area .footer-widget-area,.pagination span.analytical-title,.pagination a:hover,.head-toggle .bc-box,.pagination .analytical-lite-current{background-color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;}
.bc_bdrclr,#content .entry-title,.pagination .analytical-current,body.ls_left .head-toggle,#contact-page iframe {border-color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;}
#skenav ul ul li.odd{background-color:<?php echo sketch_get_option($shortname.'_nav_oitem'); ?>;}
#skenav ul ul li.even{background-color:<?php echo sketch_get_option($shortname.'_nav_eitem'); ?>;}
#skenav ul ul li.current_page_item.even a{color:<?php echo sketch_get_option($shortname.'_nav_oitem'); ?>;}
#skenav ul ul li.current_page_item.odd a{color:<?php echo sketch_get_option($shortname.'_nav_eitem'); ?>;}
body.ls_left #head_block,body.skegallery #skenav{border-color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;}
#skenav ul li.current_page_item > a, #skenav ul li.current-menu-ancestor > a, #skenav ul li.current-menu-item > a, #skenav ul li.current-menu-parent > a {
color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;
}
* html #skenav ul li.current_page_item a, * html #skenav ul li.current-menu-ancestor a, * html #skenav ul li.current-menu-item a, * html #skenav ul li.current-menu-parent a, * html #skenav ul li a:hover {
color:<?php echo sketch_get_option($shortname.'_base_color'); ?>;
}
#blog_wrapper .blog_content .post-mata,#blog_wrapper .blog_content .post-mata .post-mon,.searchform,body.ls_top #header-area{border-color:<?php echo sketch_get_option($shortname.'_base_color2'); ?>;}
#blog_wrapper .blog_sidebar .widget-title{color:<?php echo sketch_get_option($shortname.'_base_color2'); ?>;}
.searchform input[type="submit"]{background-color:<?php echo sketch_get_option($shortname.'_base_color2'); ?>;}
</style>
<script type="text/javascript">
ddsmoothmenu.init({
 mainmenuid: "menu-container", //menu DIV id
 orientation: '<?php echo $nav_orient; ?>', //Horizontal or vertical menu: Set to "h" or "v"
 classname: 'menu', //class added to menu's outer DIV
 contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
<!-- custom code here -->