<?php
//-- POST AND PAGE BACKEND OPTIONS ----------------------------------
//-------------------------------------------------------------------
// Hook for adding page/post custom mata boxes
add_action("admin_menu", "skebggallery_post_meta_box_options");
add_action('save_post', 'skebggallery_post_meta_box_save');
function skebggallery_post_meta_box_options(){
	if( function_exists( 'add_meta_box' ) ) {
		$post_types=get_post_types(); 
		foreach($post_types as $post_type) {
			add_meta_box("skebggallery_post_metas", "Analytical Sketch Background Gallery", "skebggallery_post_meta_box_add", $post_type, "normal", "high");
		}
	}else{}
}
function skebggallery_post_meta_box_add()
{
	global $post;
	$skebgg_custom = get_post_custom($post->ID);
	$ske_exists_meta = get_post_meta($post->ID, 'skebg_bgcolor', true);
	
	if(!empty($ske_exists_meta)){
	$custom = skebg_checkMataValues($skebgg_custom);
	$skebgg_disable = $custom["skebg_disable"][0];
	$skebgg_check = $custom["skebg_check"][0];
	$skebgg_time = $custom["skebg_time"][0];
	$skebgg_transition = $custom["skebg_transition"][0];
	$skebgg_nav = $custom["skebg_nav"][0];
	$skebgg_playpause = $custom["skebg_playpause"][0];
	$skebgg_thumbs = $custom["skebg_thumbs"][0];
	$skebgg_thumbs_display = $custom["skebg_thumbs_display"][0];
	$skebgg_random = $custom["skebg_random"][0];
	$skebgg_overlay_only = $custom["skebg_overlay"][0];
	$skebgg_BgChkbox = $custom["skebg_bgchkbox"][0];
	$skebgg_Bgcolor = $custom["skebg_bgcolor"][0];
	$skebgg_bgvdochk = $custom["skebg_bgvdochk"][0];
	$skebgg_bgvdourl = $custom["skebg_bgvdourl"][0];
	$skebgg_bgvdrept = $custom["skebg_bgvdrept"][0];
	$skebgg1 = $custom["skebg_slide1"][0];
	$skebgg2 = $custom["skebg_slide2"][0];
	$skebgg3 = $custom["skebg_slide3"][0];
	}
	else{
	$skebgg_disable = 0;
	$skebgg_check = 0;
	$skebgg_time = '8';
	$skebgg_transition = '1';
	$skebgg_nav = 1;
	$skebgg_playpause = 1;
	$skebgg_thumbs = 1;
	$skebgg_thumbs_display = 'square';
	$skebgg_random = 0;
	$skebgg_overlay_only = 1;
	$skebgg_BgChkbox = 0;
	$skebgg_Bgcolor = '#111';
	$skebgg_bgvdochk = 0;
	$skebgg_bgvdourl = 'http://www.youtube.com/watch?v=e4Is32W-ppk';
	$skebgg_bgvdrept = 1;
	$skebgg1 = SKETCHBGSURL.'slide1.jpg';
	$skebgg2 = SKETCHBGSURL.'slide2.jpg';
	$skebgg3 = SKETCHBGSURL.'slide3.jpg';
	}
?>
<div id="skebg_wrapper" class="skebg_matas">
	<div class="skebg_cont">
		<div class="skebg_leftbox">
			<br/>
			<div class="skebg_checkbox" style="line-height: 23px;margin-left: 12px;">
				<label for="skebg_disable" class="skebg_mkchk <?php if($skebgg_disable){ ?>checked<?php } ?>"></label><input type="checkbox" class="skebg_post skebg_chkbox" name="skebg_disable" id="skebg_disable" <?php if($skebgg_disable){ ?> checked <?php } ?> value="1"/><span class="skebg_fBitter" style="font-size:14px;position:relative;top:2px;"><?php _e('Check it, if you want to <b>Disable</b> Sketch BG-Gallery for this post/page.','analytical'); ?> </span>
			</div>
			<br/>
			<div class="skebg_disable">
				<div class="skebg_checkbox" style="line-height: 23px;margin-left: 12px;">
					<label id="skebg_addchk" for="skebg_check" class="skebg_mkchk <?php if($skebgg_check){ ?>checked<?php } ?>"></label><input type="checkbox" class="skebg_post skebg_chkbox" name="skebg_check" id="skebg_check" <?php if($skebgg_check){ ?> checked <?php } ?> value="true"/><span style="color:#886d0b;font-size:14px;position:relative;top:2px;" class="skebg_fBitter"><?php _e('Add <b>Sketch BG-Gallery</b> to this post/page.','analytical'); ?></span>
				</div>	
				<br/>
				<div class="skebg_table skebg_wrap">	
					<div class="skebg_topbox">
						<div style="height: 45px;width: 112px;float:left;"></div>
						<a class="skebg_expCol" title="Expand/Collapse" href="Javascript:void(0);"></a>
						<div class="skebg_clear"></div>
					</div>
					<div class="skebg_block">
						<div class="skebg_settings">
							<div class="skebg_distxt"><?php _e('APPEARANCE SETTINGS','analytical'); ?></div>
							<div class="skebg_savebox"><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
						</div>
						<div class="skebg_extendbox">
							<div class="skebg_topbdr"></div>
							<div class="skebg_midbdr">
								<table style="margin:0;padding:0;width:500px;" cellpadding="8">
									<tr><th><label><?php _e('Slide Duration:','analytical'); ?></label> </th><td><input type="text" name="skebg_time" value="<?php echo $skebgg_time; ?>" /> <small>(<b><?php _e('in Seconds','analytical'); ?></b>)</small>
										<a class="skebg_tooltip" title="<?php _e("How many seconds an image must stay.",'analytical'); ?>"></a></td></tr>
									<tr><th><label><?php _e('Transition Speed:','analytical'); ?></label> </th><td><input type="text" name="skebg_transition" value="<?php echo $skebgg_transition; ?>" /> <small>(<b><?php _e('in Seconds','analytical'); ?></b>)</small>
										<a class="skebg_tooltip" title="<?php _e("How many seconds for the transition from one image to another.",'analytical'); ?>"></a></td></tr>
									<tr><th><?php _e("Show Navigation:",'analytical'); ?></th><td><label class="skebg_setchk<?php if($skebgg_nav){ ?> checked <?php } ?>" for="skebg_nav"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_nav" name="skebg_nav" <?php if($skebgg_nav){ ?> checked <?php } ?> />
										<a class="skebg_tooltip" title="<?php _e("Enable/Disable Navigation for the slideshow.",'analytical'); ?>"></a></td></tr>
									<tr><th><?php _e("Show Play/Pause Key:",'analytical'); ?></th><td><label class="skebg_setchk<?php if($skebgg_playpause){ ?> checked <?php } ?>" for="skebg_playpause"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_playpause" name="skebg_playpause" <?php if($skebgg_playpause){ ?> checked <?php } ?> />
										<a class="skebg_tooltip" title="<?php _e("Enable/Disable Play/Pause button.",'analytical'); ?>"></a></td></tr>
									<tr><th><?php _e("Show Thumbnails:",'analytical'); ?></th><td><label class="skebg_setchk<?php if($skebgg_thumbs){ ?> checked <?php } ?>" for="skebg_thumbs"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_thumbs" name="skebg_thumbs" <?php if($skebgg_thumbs){ ?> checked <?php } ?> />
										<a class="skebg_tooltip" title="<?php _e("Enable/Disable Thumbnails.",'analytical'); ?>"></a></td></tr>
									<tr><th><?php _e("Thumbnails Display:",'analytical'); ?></th>
									<td>
										<div>
										<label class="skebg_td skebg_thumbs_square <?php if($skebgg_thumbs_display == "square"){ ?> checked <?php } ?>" for="skebg_thumbs_square"><input type="radio" id="skebg_thumbs_square" value="square" name="skebg_thumbs_display" <?php checked('square', $skebgg_thumbs_display); ?> /></label>
										<label class="skebg_td skebg_thumbs_circle <?php if($skebgg_thumbs_display == "circle" ){ ?> checked <?php } ?>" for="skebg_thumbs_circle"><input type="radio" id="skebg_thumbs_circle" value="circle" name="skebg_thumbs_display" <?php checked('circle', $skebgg_thumbs_display); ?> /></label>	
										<div class="skebg_clear"></div></div>                                                                                                                                                                                                                                                    
									</td></tr> 
									<tr><th><?php _e("Random Images:",'analytical'); ?></th><td><label class="skebg_setchk<?php if($skebgg_random){ ?> checked <?php } ?>" for="skebg_random"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_random" name="skebg_random" <?php if($skebgg_random){ ?> checked <?php } ?> />
										<a class="skebg_tooltip" title="<?php _e("Set to 'ON' if you want to show the images in a Random Order.",'analytical'); ?>"></a></td></tr>
								</table>
								<div class="skebg_clear"></div>
							</div>
							<div class="skebg_btmbdr"></div>
						</div>
					</div>
					<div class="skebg_block">
						<div class="skebg_settings">
							<div class="skebg_distxt"><?php _e('OVERLAY SETTINGS','analytical'); ?></div>
							<div class="skebg_savebox"><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
						</div>
						<div class="skebg_extendbox">
							<div class="skebg_topbdr"></div>
							<div class="skebg_midbdr">
								<table style="margin:0;padding:0;" cellpadding="8">
									<tr><th><?php _e('Display Overlay:','analytical'); ?></th><td>&nbsp;<label class="skebg_mkchk <?php if($skebgg_overlay_only){ ?>checked<?php } ?>" for="skebg_overlay"></label><input id="skebg_overlay" class="skebg_chkbox skebg_wrap_chkbox" type="checkbox" name="skebg_overlay" value="1" <?php if($skebgg_overlay_only){ ?> checked <?php } ?> />&nbsp;<span class="skebg_fBitter"><?php _e('Check it, if you want "<i>Overlay Effect</i>".','analytical') ?></span>
										<a class="skebg_tooltip" title="<?php _e("Check if you want to use the overlay effect and select one of the following overlay effects.",'analytical'); ?>"></a></td></tr>		
									<tr><th><label><?php _e('Set Overlay Effect:','analytical'); ?></label></th>
									<td>
										<label class="skebg_rdlb active" for="skebg1" style="background:url('<?php echo SKETCHBGSURL ?>overlay/01.png');"><input type="radio" id="skebg1" ></label>
										
										<div style="color: #032749; float: left; font-size: 13px; font-weight: bold; padding-right: 20px; padding-top: 12px; width: 280px;padding-left:20px;" class="comewithpro">
											<?php _e('These all overlays comes with Pro Version. To activate please Upgrade Theme.','analytical'); ?>
											<a class="purlink" href="#" target="_blank"><?php _e('Click Here To Upgrade','analytical'); ?></a>
											<label class="skebg_rdlb" for="skebg2" style="background:url('<?php echo SKETCHBGSURL ?>overlay/02.png');"><input type="radio" id="skebg2" ></label>
											<label class="skebg_rdlb" for="skebg3" style="background:url('<?php echo SKETCHBGSURL ?>overlay/03.png');"><input type="radio" id="skebg3" ></label>
											<label class="skebg_rdlb" for="skebg4" style="background:url('<?php echo SKETCHBGSURL ?>overlay/04.png');"><input type="radio" id="skebg4" ></label>
											<label class="skebg_rdlb" for="skebg5" style="background:url('<?php echo SKETCHBGSURL ?>overlay/05.png');"><input type="radio" id="skebg5" ></label>
											<label class="skebg_rdlb" for="skebg6" style="background:url('<?php echo SKETCHBGSURL ?>overlay/06.png');"><input type="radio" id="skebg6" ></label>
											<label class="skebg_rdlb" for="skebg7" style="background:url('<?php echo SKETCHBGSURL ?>overlay/07.png');"><input type="radio" id="skebg7" ></label>
											<label class="skebg_rdlb" for="skebg8" style="background:url('<?php echo SKETCHBGSURL ?>overlay/08.png');"><input type="radio" id="skebg8" ></label>
											<label class="skebg_rdlb" for="skebg9" style="background:url('<?php echo SKETCHBGSURL ?>overlay/09.png');"><input type="radio" id="skebg9" ></label>
											<label class="skebg_rdlb" for="skebg10" style="background:url('<?php echo SKETCHBGSURL ?>overlay/10.png');"><input type="radio" id="skebg10" ></label>
											<label class="skebg_rdlb" for="skebg11" style="background:url('<?php echo SKETCHBGSURL ?>overlay/11.png');"><input type="radio" id="skebg11" ></label>
											<label class="skebg_rdlb" for="skebg12" style="background:url('<?php echo SKETCHBGSURL ?>overlay/12.png');"><input type="radio" id="skebg12" ></label>
											<label class="skebg_rdlb" for="skebg13" style="background:url('<?php echo SKETCHBGSURL ?>overlay/13.png');"><input type="radio" id="skebg13" ></label>
											<label class="skebg_rdlb" for="skebg14" style="background:url('<?php echo SKETCHBGSURL ?>overlay/14.png');"><input type="radio" id="skebg14" ></label>
										</div>
										<div class="skebg_clear"></div>
									</td>
								</table>	
								<div class="skebg_clear"></div>
							</div>
							<div class="skebg_btmbdr"></div>
						</div>
					</div>
					<div class="skebg_block">
						<div class="skebg_settings">
							<div class="skebg_distxt"><?php _e('BACKGROUND COLOR SETTINGS','analytical'); ?></div>
							<div class="skebg_savebox"><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
						</div>
						<div class="skebg_extendbox">
							<div class="skebg_topbdr"></div>
							<div class="skebg_midbdr">
								<table style="margin:0;padding:0;" cellpadding="8">
									<tr><th><?php _e('Enable BG-Color:','analytical'); ?></th><td><div><label class="skebg_mkchk <?php if($skebgg_BgChkbox){ ?> checked <?php } ?>" for="skebg_bgchkbox"></label><input type="checkbox" class="skebg_chkbox skebg_wrap_chkbox" id="skebg_bgchkbox" value="1"  <?php if($skebgg_BgChkbox){ ?> checked <?php } ?> name="skebg_bgchkbox" />&nbsp;<span class="skebg_fBitter" style="margin-left: 4px;"><?php _e('Check it, if you want to use "BG color instead of gallery images".','analytical'); ?></span></div></td></tr>
									<tr><th><?php _e("Background Color:",'analytical'); ?></th><td><div class="skebg_colwrap"><input style="background-image: none;" type="text" id="skebg_bgcolor" class="skebg_color_inp" value="<?php if($skebgg_Bgcolor) echo $skebgg_Bgcolor; ?>" name="skebg_bgcolor" /><div class="skebg_colsel skebg_bgcolor"></div></div>
										<a class="skebg_tooltip" title="<?php _e("Check if you want to use background color instead of images and select what color you want to use.",'analytical'); ?>"></a></td></tr>				
								</table>	
								<div class="skebg_clear"></div>
							</div>
							<div class="skebg_btmbdr"></div>
						</div>
					</div>
					
					<div class="skebg_block">
						<div class="skebg_settings">
							<div class="skebg_distxt"><?php _e('BACKGROUND VIDEO SETTINGS','analytical'); ?></div>
							<div class="skebg_savebox"><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
						</div>
						<div class="skebg_extendbox">
							<div class="skebg_topbdr"></div>
							<div class="skebg_midbdr">
								<table border="0">
									<tr><th><?php _e('Enable BG-Video:','analytical'); ?></th><td><div><label class="skebg_mkchk <?php if($skebgg_bgvdochk){ ?> checked <?php } ?>" for="skebg_bgvdochk"></label><input type="checkbox" class="skebg_chkbox skebg_wrap_chkbox" id="skebg_bgvdochk" value="1"  <?php checked('1', $skebgg_bgvdochk); ?> name="skebg_bgvdochk" />&nbsp;<span class="skebg_fBitter" style="margin-left: 4px;"><?php _e('Check it, if you want to use "BG Video instead of gallery images".','analytical'); ?></span></div></td></tr>
									<tr><th><label><?php _e('URL (.mp4 / YouTube/ Vimeo):','analytical'); ?></label></th><td><input class="skebg_uploadimg"  type="text" name="skebg_bgvdourl" value="<?php echo $skebgg_bgvdourl; ?>" /><a class="skebg_tooltip" style="left: 5px;top: 2px;" title="<?php _e("Check if you want to use background video instead of images & bg-color and enter video path/url that you want to show.",'analytical'); ?>"></a></td></tr>	
									<tr><th><?php _e("Repeat Video:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($skebgg_bgvdrept){ ?> checked <?php } ?>" for="skebg_bgvdrept"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_bgvdrept" name="skebg_bgvdrept" <?php checked('1', $skebgg_bgvdrept); ?> />
										<a class="skebg_tooltip" title="<?php _e("Set No/Off Video looping.",'analytical'); ?>"></a></td></tr>
								</table>	
								<div class="skebg_clear"></div>
							</div>
							<div class="skebg_btmbdr"></div>
						</div>
					</div>
					
					<div class="skebg_block">
						<div class="skebg_settings">
							<div class="skebg_distxt"><?php _e('BACKGROUNDS SETTINGS','analytical'); ?></div>
							<div class="skebg_savebox"><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
						</div>
						<div class="skebg_extendbox">
							<div class="skebg_topbdr"></div>
							<div class="skebg_midbdr">
								<table style="margin:0;padding:0;" cellpadding="8">
									<tr><th align="right"><label><?php _e('BG-Image 1 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" name="skebg_slide1" value="<?php echo $skebgg1; ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
									<tr><th align="right"><label><?php _e('BG-Image 2 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" name="skebg_slide2" value="<?php echo $skebgg2; ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
									<tr><th align="right"><label><?php _e('BG-Image 3 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" name="skebg_slide3" value="<?php echo $skebgg3; ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
								</table>
								<table class="comewithpro">
									<tr><td colspan="2" style="text-align: center;">
									<div class="proinfo"><?php _e('These features comes with Pro Version. To activate please Upgrade Theme.','analytical'); ?></div>
									<a class="purlink" href="#" target="_blank"><?php _e('Click Here To Upgrade','analytical');?></a>
									</td></tr>
									<tr><th><label><?php _e('BG-Image 4 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                    
									<tr><th><label><?php _e('BG-Image 5 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                     
									<tr><th><label><?php _e('BG-Image 6 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                      
									<tr><th><label><?php _e('BG-Image 7 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                       
									<tr><th><label><?php _e('BG-Image 8 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                               
									<tr><th><label><?php _e('BG-Image 9 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
									<tr><th><label><?php _e('BG-Image 10 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
								</table>
								<input type="hidden" name="meta_is_submit" value="yes" />
								<div class="skebg_clear"></div>
							</div>
							<div class="skebg_btmbdr"></div>						
						</div>
					</div>
					<br/>
				</div>
			</div>
		</div>
		<div class="skebg_clear"></div>
	</div>
</div>
<?php
}
function skebggallery_post_meta_box_save($post_id)
{
	global $post;
	if(isset($_POST['meta_is_submit']))
	{
		$_POST = skebg_validate_mataValues($_POST);
		update_post_meta($post_id, "skebg_disable",$_POST['skebg_disable']);
		update_post_meta($post_id, "skebg_check",$_POST['skebg_check']);
		update_post_meta($post_id, "skebg_time",$_POST['skebg_time']);
		update_post_meta($post_id, "skebg_transition",$_POST['skebg_transition']);
		update_post_meta($post_id, "skebg_nav",$_POST['skebg_nav']);
		update_post_meta($post_id, "skebg_playpause",$_POST['skebg_playpause']);
		update_post_meta($post_id, "skebg_thumbs",$_POST['skebg_thumbs']);
		update_post_meta($post_id, "skebg_thumbs_display",$_POST['skebg_thumbs_display']);
		update_post_meta($post_id, "skebg_random",$_POST['skebg_random']);
		update_post_meta($post_id, "skebg_overlay",$_POST['skebg_overlay']);
		update_post_meta($post_id, "skebg_bgchkbox",$_POST['skebg_bgchkbox']);
		update_post_meta($post_id, "skebg_bgcolor",$_POST['skebg_bgcolor']);
		update_post_meta($post_id, "skebg_bgvdochk",$_POST['skebg_bgvdochk']);
		update_post_meta($post_id, "skebg_bgvdourl",$_POST['skebg_bgvdourl']);
		update_post_meta($post_id, "skebg_bgvdrept",$_POST['skebg_bgvdrept']);
		update_post_meta($post_id, "skebg_slide1",$_POST['skebg_slide1']);
		update_post_meta($post_id, "skebg_slide2",$_POST['skebg_slide2']);
		update_post_meta($post_id, "skebg_slide3",$_POST['skebg_slide3']);
	}
}
//--------------------------------------------------------------------------------------
?>
