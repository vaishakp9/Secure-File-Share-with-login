<?php
get_header();
global $shortname;
global $themename;
 ?>
<!-- #Container Area -->
<div id="container">
	<!-- .content_wrap -->
	<div class="content_wrap">
		<!-- #Content -->
		<div id="content">
			<!-- Blog -->		
			<div id="blog_wrapper" class="blog_wrap clearfix">
				<!-- Blog-content -->
				<div class="blog_content">
					<?php
					if(get_query_var( 'page')){$paged=get_query_var('page');}
					else{$paged=get_query_var('paged');}
					?>
					<?php if(have_posts()) : ?>
					<div class="clearfix">
					<?php while(have_posts()) : the_post(); ?>
						<div <?php post_class('box'); ?> id="post-<?php the_ID(); ?>">
							<div class="post-info">
								<div class="post-mata">
									<div class="post-date"><?php the_time('jS') ?></div>
									<div class="post-mon"><?php the_time('M') ?></div>
								</div>
								<div class="post-title champlimbld"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
							</div>
							
							<div class="post-thumb">
							   <?php 
									if(has_post_thumbnail())
									{
									?>
									<div class="thumb-wrap">
									<?php the_post_thumbnail('full'); ?>
									</div>
									<?php
									}
									else
									{
									?>
									<div class="thumb-wrap">
										<img src="<?php echo get_template_directory_uri();?>/images/default/blog-img.jpg" alt="<?php the_title();?>" />
									</div>
									<?php
									}
								?>
							</div> <!-- .blog-thumb -->
							<!-- .post-metas -->
							<div class="post-matas">
								<?php 
								  
									$author_url = get_author_posts_url(get_the_author_meta( 'ID' ));
									$author_nm = get_the_author_meta('user_nicename',$post->post_author);
								?>
								<div class="clearfix">
									<a class="p_author" href="<?php if(isset($author_url)){ echo $author_url; }?>" ><?php echo $author_nm; ?></a>
									<div class="comment"> <?php comments_popup_link('No Comments ', '1 Comment ', '% Comments ') ; ?> </div>
								</div>
								<div class="p_tags"><?php the_tags('Tagged in '); ?><?php _e(' and posted in ','analytical'); ?><?php echo get_the_category_list( __( ', ', 'analytical' ) );?></div>
							</div>
							<!-- .post-metas -->
							<div class="hr_border"></div>
							<div class="post_excerpt jqu_cont"><?php the_content(); ?></div>
							<div class="hr_border"></div>
							<?php wp_link_pages('<p class="clear"><strong>Pages:</strong> ', '</p>', 'number'); ?>
							<?php edit_post_link(__('Edit','analytical'), __('<br><p>','analytical'), __('</p>','analytical')); ?>

							<div class="navigation clearfix">
								<?php previous_post_link('%link'); ?>  <?php next_post_link(' %link'); ?>
							</div>
							
							<div class="depth_bdr"></div>
							
							<div class="comments-template">
								<?php comments_template(); ?>
							</div>
						</div> <!-- .box -->
					<?php endwhile; ?>
					</div>
					<?php else :  ?>
					<div class="post">
					<h2><?php _e('Post Not Exist','analytical'); ?></h2>
					</div>
					<?php endif; ?>	
				</div>
				<!-- Blog-content -->
				
				<!-- Blog-Sidebar -->
				<div class="blog_sidebar">
					<?php get_sidebar('blog'); ?>
				</div>
				<!-- Blog-Sidebar -->
			</div> <!-- Blog -->
		</div>
		<!-- #Content -->
	</div>
	<!-- .content_wrap -->
</div>
<!-- #Container Area -->
<?php get_footer(); ?>