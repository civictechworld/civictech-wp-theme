<h4>UNSCRAPED</h4>
<div  style="height:400px;overflow-y:scroll">
<?php
$sql = "no_link = 0 and scraped = 0  and error400 = 0 and error404 = 0 and isPDF = 0";
$unscrapedlinks = getLinkArray($sql);
foreach($unscrapedlinks as $key => $value){

    print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

    if(@$_GET['key'] == $value['id']){
        $this_link = $value;
    }

}
?>
</div>
<h4>SCRAPED</h4>
<div class="list-wrap">
<?php
$sql = "no_link = 0 and scraped = 1  and error400 = 0 and error404 = 0 and isPDF = 0 order by id DESC";
    $scrapedlinks = getLinkArray($sql);
    foreach($scrapedlinks as $key => $value){

        print $value['id'].' <a href="?scrape=1&key='.$value['id'].'&url='.$value['URL'].'">'.$value['name'].'</a><br>';

        if(@$_GET['key'] == $value['id']){
            $this_link = $value;
        }

    }
?>
</div>
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

