<?php get_header(); global $themename; global $shortname; ?>
<!-- #Container Area -->
<div id="container" class="clearfix">
	<div class="clearfix">
		<!-- .content_wrap -->
		<div class="content_wrap">
			<!-- #Content -->
			<div id="content">
				<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
					<h2 class="entry-title champlimbld">
						<a href="<?php the_permalink(); ?>" class="champlimbld" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php
						  if ((class_exists('ana_breadcrumb_class'))) {$ana_breadcumb->custom_breadcrumb();}
						?>
					<div class="entry clearfix">
						<?php the_content(); ?>
						<?php wp_link_pages(__('<p><strong>Pages:</strong> ','analytical'), __('</p>','analytical'), __('number','analytical')); ?>
						<?php edit_post_link(__('Edit','analytical'), __('<p class="clearfix">','analytical'), __('</p>','analytical')); ?>
					</div>
					<!--Start Comment box-->
					  <?php comments_template(); ?>
					<!--End comment Section-->
				</div>
				<?php endwhile; ?>
				<!-- Pagination -->
				<div class="pagination clearfix">
					<?php if(function_exists('ana_pagenavi') && sketch_get_option($shortname.'_show_pagenavi')) { ana_pagenavi();} else { ?>
							<div class="alignleft"><?php previous_posts_link('&larr;Previous') ?></div>
							<div class="alignright"><?php next_posts_link('Next&rarr;','') ?></div>
					<?php } ?>
				</div>
				<!-- Pagination -->
				<?php else : ?>
				<div class="post"><h2><?php _e('Not Found','analytical'); ?></h2></div>
				<?php endif; ?>		
			</div>
			<!-- #Content --->
		</div>
		<!-- .content_wrap -->
    </div>
</div>
<!-- #Container Area -->
<?php get_footer(); ?>