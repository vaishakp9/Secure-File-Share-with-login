<?php global $shortname; global $themename; ?>
<!-- #Footer Area -->
<!-- Please donot modify this section -->
<div id="footer-area">
	<?php get_sidebar('footer'); ?>
	<!-- Footer Copyright info -->
	<div id="foot_copyrt" class="colreg">
		<div class="fcenter copyright_box">
	<?php 
		if(sketch_get_option($shortname.'_copyright')){ 
		$string = sketch_get_option($shortname.'_copyright');
		$fstring = ske_striptag('br',$string);
	?>
		<?php echo $fstring; ?> | 
			
		
	<?php } ?>
	<span class="powered-by">Analytical Lite By <a title="Sketch Themes" target="_blank" href="http://www.sketchthemes.com/">SketchThemes</a></span>
	</div>
	</div>
	<!-- Footer Copyright info -->
</div>
<!-- #Footer Area -->
</div>
<?php wp_footer(); ?>
</body>
</html>