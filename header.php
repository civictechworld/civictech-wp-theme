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
				<li><a href="/admin/scrape">Scrape</a></li>
				<li><a href="/admin/import">Import</a></li>
				<li><a href="/admin/tagging">Tagging</a></li>
				
				
			</ul>

		</div>

	</header><!-- #masthead -->
	<nav>
			
			<ul class="megamenu yellow">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Grid</a>
					<div class="megapanel">
						<div class="row">
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col2"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col3"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col4"></div>
							<div class="col1"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col5"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col6"></div>
						</div>
						<div class="row">
							<div class="col3"></div>
							<div class="col3"></div>
						</div>
						<div class="row">
							<div class="col2"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col2"></div>
						</div>
						<div class="row">
							<div class="col1"></div>
							<div class="col4"></div>
							<div class="col1"></div>
						</div>
						<div class="row">
							<div class="col4"></div>
							<div class="col2"></div>
						</div>
						<div class="row">
							<div class="col2"></div>
							<div class="col3"></div>
							<div class="col1"></div>
						</div>
					</div>
				</li>
				<li><a href="#">Images</a>
					<div class="megapanel">
						<div class="row">
							
						</div>
						<div class="row">
							
						</div>
						<div class="row">
						
					</div>
				</li>
				<li><a href="#">Dropdown</a>
					<ul class="dropdown">
						<li><a href="#">Dropdown item</a></li>
						<li><a href="#">Dropdown item</a></li>
						<li><a href="#">Dropdown item</a>
							<ul class="dropdown">
								<li><a href="#">Dropdown item</a></li>
								<li><a href="#">Dropdown item</a></li>
								<li><a href="#">Dropdown item</a>
									<ul class="dropdown">
										<li><a href="#">Dropdown item</a></li>
										<li><a href="#">Dropdown item</a></li>
										<li><a href="#">Dropdown item</a></li>
										<li><a href="#">Dropdown item</a></li>
									</ul>
								</li>
								<li><a href="#">Dropdown item</a></li>
							</ul>
						</li>
						<li><a href="#">Dropdown item</a></li>
					</ul>
				</li>
				<li><a href="#">Contact</a>
					<div class="megapanel">
						<div class="row">
							<div class="col3">
								<form class="contact">
									<input id="name" type="text" placeholder="Name" />
									<input id="email" type="text" placeholder="E-mail" />
									<textarea rows="8" id="message" placeholder="Message"></textarea>
									<input type="submit" value="Send"/>
								</form>
							</div>
							<div class="col3">
								<h4>Contact info</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo velit at eros feugiat ullamcorper sed sit amet velit. Cras in mattis nulla, quis vehicula tellus. Donec non ultricies tellus. Praesent venenatis, purus et aliquet sodales.</p>
								<p>Augue velit semper turpis, id vehicula augue lacus nec lorem. Proin ultricies risus vel mauris placerat ultricies. Curabitur bibendum vulputate mi sed tincidunt. Aenean eu risus a ipsum auctor mattis. Proin sagittis eget lorem sit amet vehicula. Curabitur bibendum vulputate mi sed tincidunt.</p>
								<div class="adress">
									<label><strong>YourCompany Inc.</strong></label>
									<label>Level 123, 123 Shopping St, New York</label>
									<label>New York 1234</label>
									<label>United States</label>
									<label>Phone: 518-427-5481</label>
									<label><a href="#"><span class="__cf_email__" data-cfemail="8af3e5fff8e9e5e7faebe4f3caf3e5fff8e9e5e7faebe4f3a4e9e5e7">[email&#160;protected]</span></a></label>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li class="right"><a href="#">Right</a></li>
			</ul>

	</nav>
	<div id="content" class="site-content">
		<div class="outer">