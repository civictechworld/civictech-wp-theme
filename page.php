<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeOnePage
 */

get_header();
 //do_action('icl_navigation_breadcrumb');

?>
<?php ///do_action('icl_navigation_menu', 'primary'); ?>

<nav>


			
			<ul class="megamenu black">
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
<?php get_footer(); ?>
