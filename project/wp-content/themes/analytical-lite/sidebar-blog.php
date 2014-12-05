<!-- #blog .widget-area -->
<div id="blogsidebar" class="widget-area" role="complementary">
	<ul class="xoxo">
		<?php
		if ( ! dynamic_sidebar( 'blog-sidebar-area' ) ) : ?>
			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives','analytical'); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta','analytical'); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif; // end blog widget area
		?>
	</ul>
</div>
<!-- #blog .widget-area -->