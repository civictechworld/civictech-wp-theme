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
					<div class="site-branding">
					<div id="tagline"><?=get_bloginfo( 'description' )?></div>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					
					</div><!-- .site-branding -->

					<span id="mobile-menu" class="mobile-menu"></span>

					<?php
						the_title( '<br><h1 class="page-title">', '</h1>' );

						//beonepage_get_breadcrumbs();
					?>


			



				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
		<div id="admin-nav">
			<ul>
				<li><a href="/admin/scrape">Scape</a></li>
				<li><a href="/admin/import">Import</a></li>
				<li><a href="/admin/tagging">Tagging</a></li>
				
				
			</ul>

		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="outer">