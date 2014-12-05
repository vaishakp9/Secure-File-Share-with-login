<?php get_header(); global $themename; global $shortname; ?>
<!-- #Container Area -->
<div id="container" class="clearfix">
	<div class="clearfix">
		<!-- .content_wrap -->
		<div class="content_wrap">
			<!-- #Content -->
			<div id="content" class="">
				<div class="post">
					<h2 class="entry-title champlimbld"><a><?php _e('Error 404 - Not Found','analytical'); ?></a></h2>
					<div class="error-search clearfix">
						<?php get_search_form(); ?> 
					</div>
					<span class="not-found-txt"><?php _e('Page Not Found.', 'analytical' ); ?></span>
					<p><?php _e( 'Apologies, but the page you requested could not be found.', 'analytical' ); ?></p>
				</div>
			</div>	
			<!-- #Content -->
		</div>
		<!-- .content_wrap -->
    </div>
</div>
<!-- #Container Area -->
<?php get_footer(); ?>