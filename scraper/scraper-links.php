<h4>UNSCRAPED</h4>
<div  style="height:400px;overflow-y:scroll">
<?php

if(@$_GET['skip']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set skipped = 1  where id = '.$_GET['skip'];
    
    $q = $wpdb->query($set);
    
} else if(@$_GET['isArticle']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set isArticle = 1  where id = '.$_GET['isArticle'];
    
    $q = $wpdb->query($set);
    
   

} else if(@$_GET['dead']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set error404 = 1  where id = '.$_GET['dead'];
    
    $q = $wpdb->query($set);
    
   

} else if(@$_GET['isPDF']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set isPDF = 1  where id = '.$_GET['isPDF'];
    
    $q = $wpdb->query($set);
    
   

}


$sql = "no_link = 0 and scraped = 0  and error400 = 0 and error404 = 0 and isPDF = 0 and isFacebook = 0 and isTwitter = 0 and isWikipedia=0 and isLinkedIn=0 and skipped = 0 and isMedium = 0 and isArticle = 0 and toDelete = 0 and isPDF = 0 and isWayBackMachine = 0";

$unscrapedlinks = getLinkArray($sql);
$next = '';
foreach($unscrapedlinks as $key => $value){

    print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

    if(@$_GET['key'] == $value['id']){
        $this_link = $value;
    }
   
    if($key == 1){
        $next = '<a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a>';
        $skip = '<a href="?scrape=1&skip='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">SKIP</a>';
        $article = '<a href="?scrape=1&isArticle='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">ARTICLE</a>';
        $isPDF = '<a href="?scrape=1&isPDF='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">PDF</a>';
        $dead = '<a href="?scrape=1&dead='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">DEAD</a>';
    }
}
?>
</div>
<h4>SCRAPED</h4>
<div class="list-wrap">
<?php
$sql = "no_link = 0 and scraped = 1  and error400 = 0 and error404 = 0 and isPDF = 0 order by id ASC";
    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
?>
</div>
<!-- NO LONGER NECESSARY
<h4>ERROR 400 (Can't Scrape)</h4>
<div  class="list-wrap">
<?php
    $sql = "no_link = 0 and scraped = 0  and error400 = 1  and error404 = 0 and isPDF = 0";
    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
    ?>
</div>
-->
<h4>PDF (Can't Scrape)</h4>
<div  class="list-wrap">
<?php
    $sql = "no_link = 0 and scraped = 0  and error400 = 0 and error404 = 0 and isPDF = 1";

    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
    ?>
</div>
<h4>404 (Dead Link</h4>
<div  class="list-wrap">
<?php
    $sql = "no_link = 0 and scraped = 0  and error400 = 0 and isPDF = 0 and error404 = 1";

    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
    ?>
</div>
<div>
    <form method="get" action="#">
        <input type="hidden" name="scrape" value="1">
        <input type="hidden" name="key" value="0">
        <input type="text" name="url" value="">
        <input type="submit" value="scrape">
        
        
        

    </form>
</div>

