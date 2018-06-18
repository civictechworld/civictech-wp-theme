<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeOnePage
 */

?>

	</div><!-- #content -->

	

	<?php if ( Kirki::get_option( 'general_go_to_top' ) == '1' ) : ?>
		<div id="go-to-top" class="go-to-top btn btn-light"><i class="fa fa-angle-up"></i></div>
	<?php endif; ?>
</div><!-- #outer -->
</div><!-- #page -->
<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		<div id="social-links">

		</div>
		<div id="sponsor-links">
			<div id="silicon-harlem" class="sponsor">
						<a href="http://siliconharlem.net" target="_blank"><img src="/wp-content/uploads/2018/06/silicon-harlem-logo.svg" alt="Silicon Harlem"></a>
			</div>
			
			<div id="civic-hall-labs" class="sponsor">
						<a href="https://www.civichalllabs.org" target="_blank"><img src="/wp-content/uploads/2018/06/civic-hall-labs.jpg" alt="Civic Hall Labs"></a>
			</div>
		</div>
		<div id="social-links">
			<div id="facebook" class="social">
						<a href="https://www.facebook.com/civictech.world/" target="_blank"><img src="/wp-content/uploads/2018/06/facebook-01.svg" alt="Facebook"></a>
			</div>
			
			<div id="twitter" class="social">
						<a href="https://twitter.com/CivicTechWorld" target="_blank"><img src="/wp-content/uploads/2018/06/twitter-01.svg" alt="Twitter"></a>
			</div>
			<div id="twitter" class="social">
						<a href="https://github.com/civictechworld" target="_blank"><img src="/wp-content/uploads/2018/06/github-01.svg" alt="GitHub"></a>
			</div>
			
		</div>

	</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
