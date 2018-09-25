 NO LONGER NECESSARY
<h4>ERROR 400 (Can't Scrape)</h4>
<div  class="list-wrap">
<?php
    $sql = "no_link = 0 and scraped = 0  and error400 = 1  and error404 = 0 and isPDF = 0$industrysql";
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
    $sql = "no_link = 0 and scraped = 0  and error400 = 0 and error404 = 0 and isPDF = 1$industrysql";

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
    $sql = "no_link = 0 and scraped = 0  and error400 = 0 and isPDF = 0 and error404 = 1$industrysql";

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

