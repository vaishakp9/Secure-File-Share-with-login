<?php
function skebggallery_backend_menu(){
$skebg_options = get_option('skebggallery_options'); 
$options = skebg_checkgetOptions($skebg_options); 
?>
<div id="skebg_wrapper">
	<div class="skebg_head"><div class="skebg_title"></div> </div>
	<div class="skebg_cont">
		<div class="skebg_leftbox">
			<div class="skebg_topbox skebg_mn">
				<a class="skebg_expCol" title="Expand/Collapse" href="Javascript:void(0);"></a>
				<div class="skebg_clear"></div>
			</div>
			<div id="skebg_settsaved"></div>
			<img id="skebg_ajaxloader" src="<?php echo SKETCHBGSURL; ?>ajax-loader.gif" />
			<form method="post" action="/" class="skebggallery_form" id="skebg_saveform">
				<div class="skebg_block">
					<div class="skebg_settings">
						<div class="skebg_distxt"><?php _e('DISPLAY SETTINGS','analytical'); ?></div>
						<div class="skebg_savebox"><input name="skebg_saves" type="submit" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
						
							<table border="0">
								<tr><th colspan="2"><?php _e('Where to show default Sketch BG-Gallery:','analytical') ?></th></tr>
								<tr><td><tr><th><?php _e("Every Where:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_allpg']){ ?> checked<?php } ?>" for="skebg_allpg"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_allpg" value="1" name="skebggallery_options[skebg_allpg]" <?php checked('1', $options['skebg_allpg']); ?> /></td></tr>
							</table>
							<table class="comewithpro">
								<tr><td colspan="2" style="text-align: center;width:618px;">
								<div class="proinfo"><?php _e('These features comes with Pro Version. To activate please Upgrade Theme.','analytical'); ?></div>
								<a class="purlink" href="#" target="_blank"><?php _e('Click Here To Upgrade','analytical'); ?></a>
								</td></tr>
								<tr><th><?php _e("Front Page:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_frontPg"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_frontPg" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Front page.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Blog Page:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_blogPg"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_blogPg" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Blog page.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Categories:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_cats"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_cats" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Category Pages.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Custom Taxonomies:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_ctaxs"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_ctaxs" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Custom Taxonomy Pages.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Tags:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_tags"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_tags" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Tag Pages.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Date Archive:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_archives"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_archives" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Archive Pages.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Author Page:",'analytical'); ?></th><td><label class="skebg_setchk" for="skebg_authors"></label><input type="checkbox" class="skebg_onoff_chkbox" id="skebg_authors" value="1" />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Sketch Gallery for the Author Pages.",'analytical'); ?>"></a></td></tr>
							</table>
							<div class="skebg_clear"></div>
						</div>
						<div class="skebg_btmbdr"></div>
					</div>
				</div>
				<div class="skebg_block">
					<div class="skebg_settings">
						<div class="skebg_distxt"><?php _e('APPEARANCE SETTINGS','analytical'); ?></div>
						<div class="skebg_savebox"><input name="skebg_saves" type="submit" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
							<table border="0">
								<tr><th><label><?php _e('Slide Duration:','analytical'); ?></label> </th><td><input type="text" name="skebggallery_options[skebg_time]" value="<?php echo $options['skebg_time'] ?>" /> <small>(<b><?php _e('in Seconds','analytical'); ?></b>)</small>
									<a class="skebg_tooltip" title="<?php _e("How many seconds an image must stay.",'analytical'); ?>"></a></td></tr>
								<tr><th><label><?php _e('Transition Speed:','analytical'); ?></label> </th><td><input type="text" name="skebggallery_options[skebg_transition]" value="<?php echo $options['skebg_transition'] ?>" /> <small>(<b><?php _e('in Seconds','analytical'); ?></b>)</small>
									<a class="skebg_tooltip" title="<?php _e("How many seconds for the transition from one image to another.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Show Navigation:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_nav']){ ?> checked <?php } ?>" for="skebg_nav"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_nav" name="skebggallery_options[skebg_nav]" <?php checked('1', $options['skebg_nav']); ?> />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Navigation for the slideshow.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Show Play/Pause Key:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_playpause']){ ?> checked <?php } ?>" for="skebg_playpause"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_playpause" name="skebggallery_options[skebg_playpause]" <?php checked('1', $options['skebg_playpause']); ?> />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Play/Pause button.",'analytical'); ?>"></a></td></tr>
								<tr><th><?php _e("Show Thumbnails:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_thumbs']){ ?> checked <?php } ?>" for="skebg_thumbs"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_thumbs" name="skebggallery_options[skebg_thumbs]" <?php checked('1', $options['skebg_thumbs']); ?> />
									<a class="skebg_tooltip" title="<?php _e("Enable/Disable Thumbnails.",'analytical'); ?>"></a></td></tr> 
								<tr><th><?php _e("Thumbnails Display:",'analytical'); ?></th>
								<td><div>
									<label class="skebg_td skebg_thumbs_square <?php if($options['skebg_thumbs_display'] == "square"){ ?> checked <?php } ?>" for="skebg_thumbs_square"><input type="radio" id="skebg_thumbs_square" value="square" name="skebggallery_options[skebg_thumbs_display]" <?php checked('square', $options['skebg_thumbs_display']); ?> /></label>
									<label class="skebg_td skebg_thumbs_circle <?php if($options['skebg_thumbs_display'] == "circle" ){ ?> checked <?php } ?>" for="skebg_thumbs_circle"><input type="radio" id="skebg_thumbs_circle" value="circle" name="skebggallery_options[skebg_thumbs_display]" <?php checked('circle', $options['skebg_thumbs_display']); ?> /></label>	
									<div class="skebg_clear"></div>
									</div></td></tr> 
								<tr><th><?php _e("Random Images:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_random']){ ?> checked <?php } ?>" for="skebg_random"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_random" name="skebggallery_options[skebg_random]" <?php checked('1', $options['skebg_random']); ?> />
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
						<div class="skebg_savebox"><input name="skebg_saves" type="submit" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
							<table border="0">
								<tr><th><?php _e('Display Overlay:','analytical'); ?></th><td>&nbsp;<label class="skebg_mkchk <?php if($options['skebg_overlay']){ ?>checked<?php } ?>" for="alloverlay"></label><input id="alloverlay" class="skebg_chkbox skebg_wrap_chkbox" type="checkbox" name="skebggallery_options[skebg_overlay]" value="1" <?php checked('1', $options['skebg_overlay']); ?> />&nbsp;<span class="skebg_fBitter"><?php _e('Check it, if you want "<i>Overlay Effect</i>".','analytical') ?></span>
									<a class="skebg_tooltip" title="<?php _e("Check if you want to use the overlay effect and select one of the following overlay effects.",'analytical'); ?>"></a></td></tr>		
								<tr><th><label><?php _e('Set Overlay Effect:','analytical'); ?></label></th>
								<td>
									<label class="skebg_rdlb active" for="skebg1" style="background:url('<?php echo SKETCHBGSURL ?>overlay/01.png');"><input type="radio" id="skebg1" ></label>
									
									<div style="float: left;  padding-right: 20px; padding-top: 12px; width: 280px;padding-left: 20px; " class="comewithpro">
										<div class="proinfo"><?php _e('These all overlays comes with Pro Version. To activate please Upgrade Theme.','analytical'); ?></div>
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
						<div class="skebg_savebox"><input name="skebg_saves" type="submit" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
							<table border="0">
								<tr><th><?php _e('Enable BG-Color:','analytical'); ?></th><td><div><label class="skebg_mkchk <?php if($options['skebg_bgchkbox']){ ?> checked <?php } ?>" for="skebg_bgchkbox"></label><input type="checkbox" class="skebg_chkbox skebg_wrap_chkbox" id="skebg_bgchkbox" value="1"  <?php checked('1', $options['skebg_bgchkbox']); ?> name="skebggallery_options[skebg_bgchkbox]" />&nbsp;<span class="skebg_fBitter" style="margin-left: 4px;"><?php _e('Check it, if you want to use "BG color instead of gallery images".','analytical'); ?></span></div></td></tr>
								<tr><th><?php _e("Background Color:",'analytical'); ?></th><td><div class="skebg_colwrap"><input style="background-image: none;" type="text" id="skebg_bgcolor" class="skebg_color_inp" value="<?php if($options['skebg_bgcolor']) echo $options['skebg_bgcolor']; else echo "#111"; ?>" name="skebggallery_options[skebg_bgcolor]" /><div class="skebg_colsel skebg_bgcolor"></div></div>
									<a class="skebg_tooltip" title="<?php _e("Check if you want to use  color instead of images and select what color you want to use.",'analytical'); ?>"></a></td></tr>
							</table>	
							<div class="skebg_clear"></div>
						</div>
						<div class="skebg_btmbdr"></div>
					</div>
				</div>
				
				<div class="skebg_block">
					<div class="skebg_settings">
						<div class="skebg_distxt"><?php _e('BACKGROUND VIDEO SETTINGS','analytical'); ?></div>
						<div class="skebg_savebox"><input name="skebg_saves" type="submit" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
							<table border="0">
								<tr><th><?php _e('Enable BG-Video:','analytical'); ?></th><td><div><label class="skebg_mkchk <?php if($options['skebg_bgvdochk']){ ?> checked <?php } ?>" for="skebg_bgvdochk"></label><input type="checkbox" class="skebg_chkbox skebg_wrap_chkbox" id="skebg_bgvdochk" value="1"  <?php checked('1', $options['skebg_bgvdochk']); ?> name="skebggallery_options[skebg_bgvdochk]" />&nbsp;<span class="skebg_fBitter" style="margin-left: 4px;"><?php _e('Check it, if you want to use "BG Video instead of gallery images".','analytical'); ?></span></div></td></tr>
								<tr><th><label><?php _e('URL (.mp4 / YouTube/ Vimeo):','analytical'); ?></label></th><td><input class="skebg_uploadimg"  type="text" name="skebggallery_options[skebg_bgvdourl]" value="<?php echo $options['skebg_bgvdourl'] ?>" /><a class="skebg_tooltip" style="left: 5px;top: 2px;" title="<?php _e("Check if you want to use background video instead of images & bg-color and enter video path/url that you want to show.",'analytical'); ?>"></a></td></tr>	
								<tr><th><?php _e("Repeat Video:",'analytical'); ?></th><td><label class="skebg_setchk <?php if($options['skebg_bgvdrept']){ ?> checked <?php } ?>" for="skebg_bgvdrept"></label><input value="1" type="checkbox" class="skebg_onoff_chkbox" id="skebg_bgvdrept" name="skebggallery_options[skebg_bgvdrept]" <?php checked('1', $options['skebg_bgvdrept']); ?> />
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
						<div class="skebg_savebox"><input type="submit" name="skebg_saves" value="Save" /><a class="skebg_plus_minus" href="Javascript:void(0);"></a><div class="skebg_clear"></div></div><div class="skebg_clear"></div>
					</div>
					<div class="skebg_extendbox">
						<div class="skebg_topbdr"></div>
						<div class="skebg_midbdr">
							<table border="0">
								<tr><th><label><?php _e('BG-Image 1 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg"  type="text" name="skebggallery_options[skebg_slide1]" value="<?php echo $options['skebg_slide1'] ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
								<tr><th><label><?php _e('BG-Image 2 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" name="skebggallery_options[skebg_slide2]" value="<?php echo $options['skebg_slide2'] ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
								<tr><th><label><?php _e('BG-Image 3 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" name="skebggallery_options[skebg_slide3]" value="<?php echo $options['skebg_slide3'] ?>" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                      
							</table>	
							<table class="comewithpro">
								<tr><td colspan="2" style="text-align: center;">
								<div class="proinfo"><?php _e('These features comes with Pro Version. To activate please Upgrade Theme.','analytical'); ?></div>
								<a class="purlink" href="#" target="_blank"><?php _e('Click Here To Upgrade','analytical'); ?></a>
								</td></tr>
								<tr><th><label><?php _e('BG-Image 4 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                    
								<tr><th><label><?php _e('BG-Image 5 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                     
								<tr><th><label><?php _e('BG-Image 6 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                      
								<tr><th><label><?php _e('BG-Image 7 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                                       
								<tr><th><label><?php _e('BG-Image 8 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>                                                                                                                                                                                                                                               
								<tr><th><label><?php _e('BG-Image 9 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
								<tr><th><label><?php _e('BG-Image 10 URL/Path:','analytical'); ?></label></th><td><input class="skebg_uploadimg" type="text" /> <input class="skebg_uploadbtn" type="button" /></td></tr>
							</table>
							
							<div class="skebg_clear"></div>
						</div>
						<div class="skebg_btmbdr"></div>						
					</div>
				</div>
				<input type="hidden" name="action" value="skebg_saved" />
				<input type="hidden" name="security" value="<?php echo wp_create_nonce('skebggallery-options-data'); ?>" />
				<p class="button-controls">
					<input type="submit" value=""  name="skebg_saves">	
				</p>
			</form>
		</div>
		<div class="skebg_clear"></div>
	</div>
	<div class="skebg_overlay"></div>
</div>
<?php
}
//--------------------------------------------------------------------------------------------------------------------------------------
?>