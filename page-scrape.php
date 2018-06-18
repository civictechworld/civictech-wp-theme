<?php get_header(); ?>

<header class="clearfix">
	<?php the_title( '<h1 class="page-title">', '</h1>' );?>

	
</header>
<!-- .page-header -->
<?php
require_once get_template_directory() . '/scraper/scraper-functions.php';
$links = getLinkArray(1);
if(@$_POST['id']){
    global $wpdb;
    $set = 'UPDATE civictech_data set ';
    $sets = array();
     foreach($_POST as $k => $value){
        if($k == 'id'){

        } else {
           array_push($sets,$k.'=\''.$value.'\'');
        }

    }
    $set .= implode(",",$sets);
    $set .= ' where id = '.$_POST['id'];
    $wpdb->query($set);
   
}



?>


<table id="scraper">

		<tr>
			<th class="pane list">

				<?php require_once "scraper/scraper-links.php"; ?>


			</th>
			<td class="pane preview">
				 <div id="iframe">
					<iframe src="<?=@$_GET['url']?>"></iframe> 
				</div>
				<div id="results">
					<?php
					require_once "scraper/scraper-parse.php"; 

					?>

				</div>

			</td>
			<td class="pane form">
				<?php 

				if(@$this_link){
				
					require_once "scraper/scraper-form.php"; 

								
				}
				?>
			</td>

		</tr>
	</table>
	<?php get_footer(); ?>