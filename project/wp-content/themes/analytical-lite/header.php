<?php global $shortname; global $themename; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- #Header Area -->
<div id="head_block"></div>
<div id="main-wrap" class="<?php if(sketch_get_option($shortname.'_layout_struc') == 'ls_left') echo "clearfix"; ?>">
<div class="header_wrap">
	<div id="header-area">
		<div id="header">
			<!-- social links -->
			<?php if(sketch_get_option($shortname.'_fbook_link') || sketch_get_option($shortname.'_twitter_link') || sketch_get_option($shortname.'_gplus_link') || sketch_get_option($shortname.'_ytube_link') || sketch_get_option($shortname.'_pint_link') || sketch_get_option($shortname.'_drib_link') || sketch_get_option($shortname.'_wordp_link')) { ?>
			<div class="social_icons clearfix">
				<div class="social_wrap">
					<?php if(sketch_get_option($shortname.'_fbook_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_fbook_link','analytical'); ?>"><div class="gc_social_button facebook"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_twitter_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_twitter_link','analytical'); ?>"><div class="gc_social_button twitter"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_gplus_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_gplus_link','analytical'); ?>"><div class="gc_social_button gplus"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_ytube_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_ytube_link','analytical'); ?>"><div class="gc_social_button ytube"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_pint_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_pint_link','analytical'); ?>"><div class="gc_social_button pint"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_drib_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_drib_link','analytical'); ?>"><div class="gc_social_button drib"></div></a><?php } ?>
					<?php if(sketch_get_option($shortname.'_wordp_link')){ ?><a target="_blank" href="<?php echo sketch_get_option($shortname.'_wordp_link','analytical'); ?>"><div class="gc_social_button wordp"></div></a><?php } ?>
				</div>
			</div>
			<?php } ?>
			<!-- social links -->
			<!-- Top Head Section -->
			<div id="top-head" class="clearfix">
				<div class="left-section">
				 <?php if(sketch_get_option($shortname.'_logo_img')){ ?>
					<!-- #logo -->
						<a id="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" style="display:block;">
							<img src="<?php echo sketch_get_option($shortname.'_logo_img'); ?>" alt="<?php echo get_option($shortname."_logo_alt"); ?>" />
						</a>
					<!-- #logo -->
					<?php } else{ ?>
					<!-- #description -->
						<div class="logo_desp">
							<a id="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" style="display:block;"><?php bloginfo('name'); ?></a> 
							<div id="site-description "><?php bloginfo( 'description' ); ?></div>
						</div>
					<!-- #description -->
					<?php } ?>
				</div>
				<div class="right-section">
					<div class="menu_wrapper">
						<!-- Hedaer Navigation  -->
						<div id="skenav" class="colitereg">
							<div id="nav_outerwrap">
								<?php if(sketch_get_option($shortname.'_flogo_img')){ ?>
								<!-- #logo -->
								<a id="floating_logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>">
									<img src="<?php echo sketch_get_option($shortname.'_flogo_img'); ?>" alt="<?php echo get_option($shortname."_logo_alt"); ?>" />
								</a>
								<!-- #logo -->
								<?php } ?>
								<?php ana_nav(); ?>
								<input type="hidden" id="clrschm" value="<?php echo sketch_get_option($shortname.'_base_color2'); ?>" />
							</div>
						</div>
						<!-- Hedaer Navigation  -->
					</div>
				</div>
			</div>
			<!-- Top Head Section -->
			<!-- Bottom Head Section -->
			<div id="bottom-head">
				<!-- Contact us block -->
				<?php if(sketch_get_option($shortname.'_sconus_content')){ ?>
					<div class="side_contus colitereg">
						<div class="sc_title"><?php _e('Contact Us','analytical'); ?></div>
						<div class="sc_text"><?php echo sketch_get_option($shortname.'_sconus_content'); ?></div>	
					</div>
				<?php } ?>
				<!-- Contact us block -->
				<!-- Copyright block -->
				
					<div class="copyright_box colreg"><?php if(sketch_get_option($shortname.'_copyright')){ echo sketch_get_option($shortname.'_copyright'); } ?><div class="powered-by"> Analytical By <a title="Sketch Themes" target="_blank" href="http://www.sketchthemes.com?utm_source=ana_pro">SketchThemes</a></div></div>
				<!-- Copyright block -->
			</div>
			<!-- Bottom Head Section -->
		</div>
	</div>
	<div class="head-toggle" title="close/open" ><a></a><div class="bc-box"></div></div>
</div>
<!-- #Header Area -->