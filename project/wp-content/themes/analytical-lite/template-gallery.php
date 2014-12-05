<?php
/*
Template Name: Gallery Template
*/
get_header();
global $shortname;
global $themename;
 ?>
<script type="text/javascript">
show_skebg_thumbs = function(){
	if(jQuery('div.skebg_thumbnails').length > 0){
		var wht = jQuery(window).height();
		var thisht = jQuery('.skebg_thumbnails').height();
		var diffht = wht - thisht;
		var half_ht = diffht / 2;
		if(!jQuery('a.skebg_showthumbs').hasClass('active')){
			jQuery('a.skebg_showthumbs').addClass('active');
			jQuery('.skebg_thumbnails').css('display','block').animate({'bottom': half_ht},250);
		}
		else{}
	}
}
jQuery(document).ready(function(){
	if(jQuery('body').hasClass('ls_left')){jQuery('body').removeClass('ls_left');jQuery('body').addClass('ls_top');}
	var totalWidth = 0;
	jQuery("#menu-main >li").not("ul ul").each(function() {totalWidth = totalWidth + jQuery(this).outerWidth(true);});
	var flogoWdth = jQuery('#floating_logo').outerWidth(true);
	jQuery('#nav_outerwrap').css({width:totalWidth+flogoWdth,margin:'0 auto'}).addClass('clearfix');
});
</script>
<div class="front_content clearfix">
	<?php
		for($skebgi=1;$skebgi < 4;$skebgi++){
			$skebg_imgT = sketch_get_option($shortname.'_gsl'.$skebgi.'_title');
			$skebg_imgC = sketch_get_option($shortname.'_gsl'.$skebgi.'_content');
			$skebg_capsArr[] = array("title"=>$skebg_imgT,"descp"=>$skebg_imgC);
		}			
	?>
	<?php if(!empty($skebg_capsArr)){ ?>
		<div class="skegallry_captions">
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
</div>
<?php get_footer(); ?>