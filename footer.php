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

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		

	</footer><!-- #colophon -->

	<?php if ( Kirki::get_option( 'general_go_to_top' ) == '1' ) : ?>
		<div id="go-to-top" class="go-to-top btn btn-light"><i class="fa fa-angle-up"></i></div>
	<?php endif; ?>
</div><!-- #outer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
