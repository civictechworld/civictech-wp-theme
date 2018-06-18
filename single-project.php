<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BeOnePage
 */

get_header(); ?>

	

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- col-md-9 -->

			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
