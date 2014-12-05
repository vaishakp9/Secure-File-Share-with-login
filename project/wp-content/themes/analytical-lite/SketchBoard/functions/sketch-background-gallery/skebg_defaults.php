<?php
function skebg_checkgetOptions($options)
{
	if(!isset($options['skebg_allpg'])){$options['skebg_allpg']=1;}
	if(!isset($options['skebg_random'])){$options['skebg_random']=0;}
	if(!isset($options['skebg_bgchkbox'])){$options['skebg_bgchkbox']=0;}
	if(!isset($options['skebg_bgcolor'])){$options['skebg_bgcolor']='#111';}
	if(!isset($options['skebg_bgvdochk'])){$options['skebg_bgvdochk']=0;}
	if(!isset($options['skebg_bgvdourl'])){$options['skebg_bgvdourl']='http://www.youtube.com/watch?v=e4Is32W-ppk';}
	if(!isset($options['skebg_bgvdrept'])){$options['skebg_bgvdrept']=0;}
	
return $options;
}
function skebg_checkMataValues($custom)
{
	if(!isset($custom['skebg_random'][0])){$custom['skebg_random'][0]=0;}
	if(!isset($custom['skebg_bgchkbox'][0])){$custom['skebg_bgchkbox'][0]=0;}
	if(!isset($custom['skebg_bgcolor'][0])){$custom['skebg_bgcolor'][0]='#111';}
	if(!isset($custom['skebg_bgvdochk'])){$custom['skebg_bgvdochk']=0;}
	if(!isset($custom['skebg_bgvdourl'])){$custom['skebg_bgvdourl']='http://www.youtube.com/watch?v=e4Is32W-ppk';}
	if(!isset($custom['skebg_bgvdrept'])){$custom['skebg_bgvdrept']=0;}
	
return $custom;
}
function skebg_validate_options($skebg_input)
{
	if(!isset($skebg_input['skebg_allpg'])){$skebg_input['skebg_allpg']=0;}
	if(!isset($skebg_input['skebg_time'])){$skebg_input['skebg_time']=null;}
	if(!isset($skebg_input['skebg_transition'])){$skebg_input['skebg_transition']=null;}
	if(!isset($skebg_input['skebg_nav'])){$skebg_input['skebg_nav']=0;}
	if(!isset($skebg_input['skebg_playpause'])){$skebg_input['skebg_playpause']=0;}
	if(!isset($skebg_input['skebg_thumbs'])){$skebg_input['skebg_thumbs']=0;}
	if(!isset($skebg_input['skebg_random'])){$skebg_input['skebg_random']=0;}
	if(!isset($skebg_input['skebg_overlay'])){$skebg_input['skebg_overlay']=0;}
	if(!isset($skebg_input['skebg_bgchkbox'])){$skebg_input['skebg_bgchkbox']=0;} 
	if(!isset($skebg_input["skebg_bgvdochk"])){$skebg_input["skebg_bgvdochk"]=0;}
	if(!isset($skebg_input["skebg_bgvdrept"])){$skebg_input["skebg_bgvdrept"]=0;}
	if(!isset($skebg_input['skebg_slide1'])){$skebg_input['skebg_slide1']=null;}  
	if(!isset($skebg_input['skebg_slide2'])){$skebg_input['skebg_slide2']=null;}  
	if(!isset($skebg_input['skebg_slide3'])){$skebg_input['skebg_slide3']=null;}  
return $skebg_input;
}
function skebg_validate_mataValues($post_mata)
{
	if(empty($post_mata["skebg_disable"])){$post_mata["skebg_disable"]=0;}
	if(empty($post_mata["skebg_check"])){$post_mata["skebg_check"]=0;}
	if(empty($post_mata["skebg_time"])){$post_mata["skebg_time"]=null;}
	if(empty($post_mata["skebg_transition"])){$post_mata["skebg_transition"]=null;}
	if(empty($post_mata["skebg_nav"])){$post_mata["skebg_nav"]=0;}
	if(empty($post_mata["skebg_playpause"])){$post_mata["skebg_playpause"]=0;}
	if(empty($post_mata["skebg_thumbs"])){$post_mata["skebg_thumbs"]=0;}
	if(empty($post_mata["skebg_random"])){$post_mata["skebg_random"]=0;}
	if(empty($post_mata["skebg_overlay"])){$post_mata["skebg_overlay"]=0;}
	if(empty($post_mata["skebg_bgchkbox"])){$post_mata["skebg_bgchkbox"]=0;}
	if(empty($post_mata["skebg_bgcolor"])){$post_mata["skebg_bgcolor"]='#111';}
	if(empty($post_mata["skebg_bgvdochk"])){$post_mata["skebg_bgvdochk"]=0;}
	if(empty($post_mata["skebg_bgvdrept"])){$post_mata["skebg_bgvdrept"]=0;}
	if(empty($post_mata["skebg_slide1"])){$post_mata["skebg_slide1"]=null;}
	if(empty($post_mata["skebg_slide2"])){$post_mata["skebg_slide2"]=null;}
	if(empty($post_mata["skebg_slide3"])){$post_mata["skebg_slide3"]=null;}
return $post_mata;
}
?>