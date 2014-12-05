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
			<h2 class="entry-title"><a>
				<?php printf( __( 'Category Archives: %s', 'analytical' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</a></h2>
			<?php if(!is_home()){
				if ((class_exists('ana_breadcrumb_class'))) {$ana_breadcumb->custom_breadcrumb();}
			} ?>
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
									$thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"ske_post_thumb");
									$title=get_the_title();
									?>
									<div class="thumb-wrap">
									<a href="<?php the_permalink();?>" class="image cboxElement" title="<?php echo $title;?>" >
									<img src="<?php echo $thumbnail[0];?>" alt="<?php the_title();?>" />
									</a>
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
								<div class="p_tags"><?php the_tags(''); ?></div>
							</div>
							<div class="hr_border"></div>
							<!-- .post-metas -->
							<div class="post_excerpt"><?php the_excerpt(); ?></div>
						</div> <!-- .box -->
					<?php endwhile; ?>
					</div>
					<!-- Pagination -->
					<div class="pagination clearfix">
						<?php if(function_exists('ana_pagenavi') && sketch_get_option($shortname.'_show_pagenavi')) { ana_pagenavi();} else { ?>
								<div class="alignleft"><?php previous_posts_link('&larr;Previous') ?></div>
								<div class="alignright"><?php next_posts_link('Next&rarr;','') ?></div>
						<?php } ?>
					</div>
					<!-- Pagination -->
					<?php else :  ?>
					<div class="post">
					<h2><?php _e('Posts Not Exist','analytical'); ?></h2>
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