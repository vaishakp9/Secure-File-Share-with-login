<?php
Class skebg_front
{
	function skebg_callJSfunc($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display)
	{
		?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery.skebggallery('#skebggallery',{
					'delay':<?php echo $skebgg_time; ?>, 
					'fadeSpeed': <?php echo $skebgg_transition; ?>,
					'navigation':<?php echo $skebgg_nav; ?>,
					'playPause':<?php echo $skebgg_playpause; ?>,
					'thumbnails':<?php echo $skebgg_thumbs; ?>,
					'thumb_style':'<?php echo $skebgg_thumbs_display; ?>'
				});
				
				if(jQuery('#skebggallery_cap').length > 0){
					jQuery.skebggcaptions('#skebggallery_cap',{
						'delay':<?php echo $skebgg_time; ?>, 
						'fadeSpeed': <?php echo $skebgg_transition; ?>
					});
				}
			});
		</script>
		<?php
	}
	
	function skebg_VdJSfunc($skebgg_bgvdourl,$skebgg_bgvdrept)
	{
		if($skebgg_bgvdourl)
		{
			if(strstr($skebgg_bgvdourl,'?v='))
			{
				$query_string = @parse_url($skebgg_bgvdourl, PHP_URL_QUERY);
				@parse_str($query_string, $youtubeid);
				?>
				<script type="text/javascript">
					jQuery(window).load(function(){
						setTimeout(function() {
							jQuery('#skebg-youtube-wrap').css({'visibility':'visible'});
							if(jQuery('.skebg_fvdcap').length > 0){
								jQuery('.skebg_fvdcap').show().css({'visibility':'visible'});
							}
							jQuery('#skebggallery-loader').remove();
							jQuery('body').append('<div id="skebg-yt-controls"><a href="javascript:void(0);" class="yt-play" title="play"></a><a href="javascript:void(0);" class="yt-pause" title="pause"></a><a href="javascript:void(0);" class="yt-mute" title="mute/unmute"></a></div>');
							jQuery('#skebg-yt-controls a.yt-mute').click(function(){
								if(!jQuery(this).hasClass('active')){
									jQuery(this).addClass('active');
								}else{
									jQuery(this).removeClass('active');
								}
							});
						}, 1000);
					});
					
					jQuery(document).ready(function(){
						jQuery('.skebg_fimgcap').hide();
						jQuery('body').append('<div id="skebggallery-loader">Loading video...</div>');
						var options = { videoId: '<?php echo $youtubeid['v']; ?>',repeat:<?php echo $skebgg_bgvdrept; ?>};
						jQuery('body').tubular(options);
					});
				</script>
				<?php 
			} 
			elseif(strstr($skebgg_bgvdourl,'vimeo.com')){
				preg_match_all('#(http://vimeo.com)/([0-9]+)#i',$skebgg_bgvdourl,$vimeoarr);
			?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery('.skebg_fimgcap').hide();
						jQuery('body').append('<div id="skebggallery-loader">Loading video...</div>');
					});
					
					jQuery(window).load(function(){
						setTimeout(function() {
							jQuery('#skebg-vimeo-player').css({'visibility':'visible'});
							if(jQuery('.skebg_fvdcap').length > 0){
								jQuery('.skebg_fvdcap').show().css({'visibility':'visible'});
							}
							jQuery('#skebggallery-loader').remove();
						}, 1000);
					});
				</script>
				<iframe id="skebg-vimeo-player" src="http://player.vimeo.com/video/<?php echo $vimeoarr[2][0]; ?>?api=1&amp;player_id=skebg-vimeo-player&amp;title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;loop=<?php echo $skebgg_bgvdrept; ?>" frameborder="0" webkitallowfullscreen allowfullscreen></iframe>
			<?php
			}
			else 
			{ 
			?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery('.skebg_fimgcap').hide();
						jQuery('body').css('padding-bottom','50px').append('<div id="skebggallery-loader">Loading video...</div>').append('<div id="skebg_scroll"></div>');
						var skebgV = new jQuery.skebgVideo();
						skebgV.init();
						skebgV.show('<?php echo $skebgg_bgvdourl; ?>',{doLoop:<?php echo $skebgg_bgvdrept; ?>});
					});
					jQuery(window).load(function(){
						setTimeout(function() {
							jQuery('#skebg-video-wrap,#skebg-video-control-container').css({'visibility':'visible'});
							if(jQuery('.skebg_fvdcap').length > 0){
								jQuery('.skebg_fvdcap').show().css({'visibility':'visible'});
							}
							jQuery('#skebggallery-loader').remove();
						}, 1000);
					});
				</script>
			<?php 
			}
		
		}// if video url exists

	}
	
	function skebg_global_sldr($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display,$skebgg_BgChkbox,$skebgg_Bgcolor,$skebgg_overlay,$skebgg_bgvdochk,$skebgg_bgvdourl,$skebgg_bgvdrept,$skebgg_slidesArr)
	{
		if(!$skebgg_BgChkbox && !$skebgg_bgvdochk){
			$this->skebg_callJSfunc($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display);
		}
		
		if($skebgg_bgvdochk){
			$this->skebg_VdJSfunc($skebgg_bgvdourl,$skebgg_bgvdrept);
		}
		
		if(!$skebgg_bgvdochk) { ?>
			<div id="skebggallery" class="skebg_global"><?php
			if($skebgg_BgChkbox){ ?><div class="skebg_bgcolor" style="background:<?php echo $skebgg_Bgcolor; ?>;"></div><?php }
			else{
				if(!empty($skebgg_slidesArr)){
					foreach($skebgg_slidesArr as $skebg_slide){
						?><img class="skebg_bg" src="<?php echo $skebg_slide; ?>" /><?php
					}
				}
			}
			if($skebgg_overlay){ ?><div class="skebg_overlay" style="background:url('<?php echo SKETCHBGSURL ?>overlay/01.png')"></div><?php }
			?>
			</div>
		<?php 
		} 
	}
	
	function skebg_single_sldr($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display,$skebgg_BgChkbox,$skebgg_Bgcolor,$skebgg_overlay,$skebgg_bgvdochk,$skebgg_bgvdourl,$skebgg_bgvdrept,$skebgg_slidesArr)
	{
		if(!$skebgg_BgChkbox && !$skebgg_bgvdochk){
			$this->skebg_callJSfunc($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display);
		}
		
		if($skebgg_bgvdochk){
			$this->skebg_VdJSfunc($skebgg_bgvdourl,$skebgg_bgvdrept);
		}
		
		if(!$skebgg_bgvdochk) { ?>
		<div id="skebggallery" class="skebg_single"><?php
			if($skebgg_BgChkbox){ ?><div class="skebg_bgcolor" style="background:<?php echo $skebgg_Bgcolor; ?>;"></div><?php }
			else{
				if(!empty($skebgg_slidesArr)){
					foreach($skebgg_slidesArr as $skebg_slide){
						?><img class="skebg_bg" src="<?php echo $skebg_slide; ?>" /><?php
					}
				}
			}
			if($skebgg_overlay){ ?><div class="skebg_overlay" style="background:url('<?php echo SKETCHBGSURL ?>overlay/01.png')"></div><?php }
			?>
		</div>
		<?php 
		} 
	}
	
	function skebg_gallery_display()
	{
		include('skebg_global_s.php');
		
		if($skebgg_allpg && !is_page() && !is_single() && !is_tax())
		{
			$this->skebg_global_sldr($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display,$skebgg_BgChkbox,$skebgg_Bgcolor,$skebgg_overlay,$skebgg_bgvdochk,$skebgg_bgvdourl,$skebgg_bgvdrept,$skebgg_slidesArr);
		}
		elseif((is_page() || is_front_page()) && !is_home())
		{
			global $post;
			$skebg_cstm = get_post_custom($post->ID);
			
			if(isset($skebg_cstm["skebg_disable"][0])){
				$skebgg_disable_s = $skebg_cstm["skebg_disable"][0];
			}else{
				$skebgg_disable_s = null;
			}
			
			if(isset($skebg_cstm["skebg_check"][0])){
				$skebgg_check_s = $skebg_cstm["skebg_check"][0];
			}else{
				$skebgg_check_s = null;
			}

			if($skebgg_check_s && !$skebgg_disable_s){
				include('skebg_single_s.php');
				$this->skebg_single_sldr($skebgg_time_s,$skebgg_transition_s,$skebgg_nav_s,$skebgg_playpause_s,$skebgg_thumbs_s,$skebgg_thumbs_display_s,$skebgg_BgChkbox_s,$skebgg_Bgcolor_s,$skebgg_overlay_s,$skebgg_bgvdochk_s,$skebgg_bgvdourl_s,$skebgg_bgvdrept_s,$skebgg_slidesArr_s);
			}
			elseif(!$skebgg_disable_s && $skebgg_allpg){
				$this->skebg_global_sldr($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display,$skebgg_BgChkbox,$skebgg_Bgcolor,$skebgg_overlay,$skebgg_bgvdochk,$skebgg_bgvdourl,$skebgg_bgvdrept,$skebgg_slidesArr);
			}
		}
		elseif(is_single())
		{
			global $post;
			$skebg_cstm = get_post_custom($post->ID);
			
			if(isset($skebg_cstm["skebg_disable"][0])){
				$skebgg_disable_s = $skebg_cstm["skebg_disable"][0];
			}else{
				$skebgg_disable_s = null;
			}
			
			if(isset($skebg_cstm["skebg_check"][0])){
				$skebgg_check_s = $skebg_cstm["skebg_check"][0];
			}else{
				$skebgg_check_s = null;
			}
		
			if($skebgg_check_s && !$skebgg_disable_s){
				include('skebg_single_s.php');
				$this->skebg_single_sldr($skebgg_time_s,$skebgg_transition_s,$skebgg_nav_s,$skebgg_playpause_s,$skebgg_thumbs_s,$skebgg_thumbs_display_s,$skebgg_BgChkbox_s,$skebgg_Bgcolor_s,$skebgg_overlay_s,$skebgg_bgvdochk_s,$skebgg_bgvdourl_s,$skebgg_bgvdrept_s,$skebgg_slidesArr_s);
			}
			elseif(!$skebgg_disable_s && $skebgg_allpg){
				$this->skebg_global_sldr($skebgg_time,$skebgg_transition,$skebgg_nav,$skebgg_playpause,$skebgg_thumbs,$skebgg_thumbs_display,$skebgg_BgChkbox,$skebgg_Bgcolor,$skebgg_overlay,$skebgg_bgvdochk,$skebgg_bgvdourl,$skebgg_bgvdrept,$skebgg_slidesArr);
			}
		}
	}
}
?>
