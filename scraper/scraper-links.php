<?php include "scraper-updates.php";?>

<h4>UNSCRAPED</h4>
<div  style="height:400px;overflow-y:scroll">
<?php


$industrysql = '';
$industryurl = '';
if(@$_GET['industry']){
    $industrysql = " and industry = '$_GET[industry]'";
    $industryurl = "&industry=$_GET[industry]";
}

$sql = "no_link = 0 and scraped = 0  and error400 = 0 and error404 = 0 and isPDF = 0 and isFacebook = 0 and isTwitter = 0 and isWikipedia=0 and isLinkedIn=0 and skipped = 0 and isMedium = 0 and isArticle = 0 and toDelete = 0 and isPDF = 0 and isWayBackMachine = 0 $industrysql";

$unscrapedlinks = getLinkArray($sql);
$next = '';
foreach($unscrapedlinks as $key => $value){

    print $value['id'].' <a href="?scrape=1'.$industryurl.'&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

    if(@$_GET['key'] == $value['id']){
        $this_link = $value;
    }
   
    if($key == 1){
        $next = '<a href="?scrape=1'.$industryurl.'&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a>';
        $skip = '<a href="?scrape=1'.$industryurl.'&skip='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">SKIP</a>';
        $article = '<a href="?scrape=1'.$industryurl.'&isArticle='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">ARTICLE</a>';
        $isPDF = '<a href="?scrape=1'.$industryurl.'&isPDF='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">PDF</a>';
        $dead = '<a href="?scrape=1'.$industryurl.'&dead='.@$_GET['key'].'&key='.$value['id'].'&url='.$value['URL'].'">DEAD</a>';
    }
}
?>
</div>
<h4>SCRAPED</h4>
<div class="list-wrap">
<?php
$sql = "no_link = 0 and scraped = 1  and error400 = 0 and error404 = 0 and isPDF = 0$industrysql order by id ASC";
    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1'.$industryurl.'&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
?>
</div>
<?php // include "scraper-bad-links.php";?>