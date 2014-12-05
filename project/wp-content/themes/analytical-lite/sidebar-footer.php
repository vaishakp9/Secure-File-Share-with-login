<?php global $themename; global $shortname; ?>
<!-- Donot modify this section code -->
<div id="footer-widget-area" role="complementary" class="clearfix">
	<?php if(sketch_get_option($shortname.'_sidebar1_title')) { ?>
	<div id="first" class="footer-widget-area">
		<div class="footbar_title colitereg"><?php echo sketch_get_option($shortname.'_sidebar1_title'); ?><a class="farr"></a></div>
		<ul class="xoxo">
			<?php if ( ! dynamic_sidebar( 'footer-first-sidebar-area' )): ?>
			  <li id="archives" class="widget-container">
					<h3 class="widget-title"><?php _e( 'Archives','analytical'); ?></h3>
					<ul>
						<?php wp_get_archives( 'type=monthly' ); ?>
					</ul>
				</li>
			<?php endif;?>
		</ul>
	</div><!-- #first .widget-area -->
	<?php } ?>
	<?php if(sketch_get_option($shortname.'_sidebar2_title')) { ?>
	<div id="second" class="footer-widget-area">
		<div class="footbar_title colitereg"><?php echo sketch_get_option($shortname.'_sidebar2_title'); ?><a class="farr"></a></div>
		<ul class="xoxo">
			<?php if (! dynamic_sidebar( 'footer-second-sidebar-area' )): ?>
			  <li id="meta" class="widget-container">
					<h3 class="widget-title"><?php _e( 'Meta', 'analytical' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php endif;?>
		</ul>
	</div><!-- #second .widget-area -->
	<?php } ?>
	<?php if(sketch_get_option($shortname.'_sidebar3_title')) { ?>
	<div id="third" class="footer-widget-area">
		<div class="footbar_title colitereg"><?php echo sketch_get_option($shortname.'_sidebar3_title'); ?><a class="farr"></a></div>
		<ul class="xoxo">
			<?php if(! dynamic_sidebar( 'footer-third-sidebar-area' )): ?>
				<li id="archives" class="widget-container">
					<h3 class="widget-title"><?php _e( 'Archives', 'analytical' ); ?></h3>
					<ul>
						<?php wp_get_archives( 'type=monthly' ); ?>
					</ul>
				</li>
			<?php endif;?>
		</ul>
	</div><!-- #third .widget-area -->
	<?php } ?>
</div><!-- #footer-widget-area -->
<!-- Donot modify this section code -->