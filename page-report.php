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

get_header(); ?>



	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'page' );
							
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
                            endwhile; // End of the loop.
                            require_once("functions/report.php");
                           extract(getStats());
                            ?>

                            <table >
                                
                                <tr>
                                    <th>Import and scraping
                                        <table style="width:300px;">
                                <tr><td>Total Records</td><td><?=$total?></td></tr>
                     
                                <tr><td>Marked as Acquired</td><td><?=$acquired?></td></tr>
                                <tr><td>Marked as Pivoted</td><td><?=$pivoted?></td></tr>
                                <tr><td>Marked as Defunct</td><td><?=$defunct?></td></tr>



                                <tr><td>No Link</td><td><?=$no_link?></td></tr>
                                <tr><td>Hyperlinks</td><td><?=$hyperlink?></td></tr>
                                <tr><td>Scraped</td><td><?php echo $scraped?></td></tr>
                                <tr><td>404</td><td><?php echo $error?></td></tr>
                                <tr><td>PDF Links</td><td><?php echo $isPDF?></td></tr>
                                <tr><td>Article</td><td><?php echo $isArticle?></td></tr>
                                
                                <tr><td>Skipped</td><td><?php echo $skipped?></td></tr>
                                <tr><td colspan="2">Links to Public Sites
                                    <table>
                                        <tr><td>Is Twitter</td><td><?php echo $isTwitter?></td></tr>
                                        <tr><td>Is Facebook</td><td><?php echo $isFacebook?></td></tr>
                                        <tr><td>is Wikipedia</td><td><?php echo $isWikipedia?></td></tr>
                                        <tr><td>is Media</td><td><?php echo $isMedium?></td></tr>
                                        <tr><td>WayBackMachine</td><td><?php echo $isWayBackMachine?></td></tr>
                        </table>

                                    </td>
                                </td></tr>
                        </table>
                        </th>
                        <th>
                              <table>
                                  Social 
                                  <?php $social_count=0;?>

                                <tr><td>Twitter</td><td><?=$twitter?></td></tr>
                                <tr><td>Facebook</td><td><?=$facebook?></td></tr>
                                <tr><td>Linkedin</td><td><?=$linkedin?></td></tr>
                                <tr><td>Instagram</td><td><?=$instagram?></td></tr>
                                <tr><td>Github</td><td><?=$github?></td></tr>
                                <tr><td>YouTube</td><td><?=$youtube?></td></tr>
                                <tr><td>Vimeo</td><td><?=$vimeo?></td></tr>
                                <tr><td>Tumblr</td><td><?=$tumblr?></td></tr>
                                <tr><td>Pinterest</td><td><?=$pinterest?></td></tr>
                                <tr><td>Google  Plus</td><td><?=$google_plus?></td></tr>
                                <tr><td>Behance</td><td><?=$behance?></td></tr>
                                <tr><td>Medium</td><td><?=$medium?></td></tr>
                                <tr><td>Slack</td><td><?=$slack?></td></tr>
                                <tr><td>Telegram</td><td><?=$telegram?></td></tr>
                                <tr><td>Skype</td><td><?=$skype?></td></tr>
                                <tr><td>Flickr</td><td><?=$flickr?></td></tr>
                                <tr><td>RSS</td><td><?=$rss?></td></tr>
                                
                               
                            </table>
                        </th>
 <th>
                              <table>
                                 
                                   <tr><th>Contact</td><td></td></tr>
                                <tr><td>Emails</td><td><?=$email?></td></tr>
                             <tr><td>Phone</td><td><?=$phone?></td></tr>

                                
                               
                            </table>
                        </th>


                        </tr>
                                
                               
                            </table>
                            <?php
                               


						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
