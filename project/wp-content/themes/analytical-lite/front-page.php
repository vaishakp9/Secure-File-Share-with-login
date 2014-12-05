<?php global $themename; global $shortname; ?>
<?php
if ( 'page' == get_option( 'show_on_front' ) ) {
	if ( sketch_get_option($shortname.'_hide_frontlayout') == 'false') {
	global $shortname; 
?>
<?php get_header(); ?>
<!-- #Container Area -->
<div id="container">
	<div class="front_content clearfix">
		<?php
			for($skebgi=1;$skebgi < 4;$skebgi++){
				$skebg_imgT = sketch_get_option($shortname.'_sl'.$skebgi.'_title');
				$skebg_imgC = sketch_get_option($shortname.'_sl'.$skebgi.'_content');
				$skebg_capsArr[] = array("title"=>$skebg_imgT,"descp"=>$skebg_imgC);
			}		
		?>
		<?php if(!empty($skebg_capsArr)){ ?>
			<div class="skegallry_captions skebg_fimgcap">
				<a class="skegallry_toggle" href="javascript:void(0);" title="hide/show caption"></a>
				<div id="skebggallery_cap">
				<?php foreach($skebg_capsArr as $skebg_nm) { ?>
					<?php if($skebg_nm['title'] || $skebg_nm['descp']) { ?>
					<div class="skegallery_citem">
					<div class="skegallry_thread"></div>
						<div class="skecap_itemwrap">
							<div class="skebg_caption">
								<?php if($skebg_nm['title']){ ?><div class="skebg_title"><?php echo $skebg_nm['title']; ?></div><?php } ?> 
								<?php if($skebg_nm['descp']){ ?><div class="skebg_descp"><?php echo $skebg_nm['descp']; ?></div><?php } ?>
							</div>
						</div>
						</div>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		<?php } ?>
		
		<?php if(sketch_get_option($shortname.'_fvd_title') || sketch_get_option($shortname.'_fvd_descp')) { ?>
		<div class="skegallry_captions skebg_fvdcap" style="display:none;">
			<a class="skegallry_toggle" href="javascript:void(0);" title="hide/show caption"></a>
			<div id="skebggallery_cap">
				<div class="skegallery_citem" style="display:block;">
					<div class="skegallry_thread"></div>
					<div class="skecap_itemwrap">
						<div class="skebg_caption" style="display:block;">
							<?php if(sketch_get_option($shortname.'_fvd_title')){ ?><div class="skebg_title"><?php echo sketch_get_option($shortname.'_fvd_title'); ?></div><?php } ?> 
							<?php if(sketch_get_option($shortname.'_fvd_descp')){ ?><div class="skebg_descp"><?php echo sketch_get_option($shortname.'_fvd_descp'); ?></div><?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<!-- #Container Area -->
<?php get_footer(); ?>
<?php 
}else{  include('index-page.php'); }
} else {
	include( get_home_template() );
}
 ?>