<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'beonepage' ); ?></a>

	<header id="masthead" class="site-header hero" role="banner">
	
		

		<div class="container">
			<div class="row">
				<div class="col-md-12 clearfix">
						<div id="logo"><img src="/wp-content/uploads/2018/07/civictechworld-01.svg" alt="Civic Tech World Logo"></div>
					<span id="mobile-menu" class="mobile-menu"></span>

					
			
	<?php
// do_action( 'wpml_add_language_selector' );
	?>


				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
		<!-- <div id="admin-nav">
			<ul>
				<li><a href="/admin/scrape">Scrape</a></li>
				<li><a href="/admin/import">Import</a></li>
				<li><a href="/admin/tagging">Tagging</a></li>
				
				
			</ul>

		</div>
-->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="outer">