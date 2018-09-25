<?php


    $fields = "name, title, description, url, twitter, facebook, linkedin, crunchbase, logo_url";
    $table = "civictech_data";
    $industrysql = '';
    $sectorsql = '';
    if(@$_GET['industry']){
        $industrysql = " and industry = '$_GET[industry]'";
        $industryurl = "&industry=$_GET[industry]";
    
    }
    if(@$_GET['sector']){
        $sectorsql = " and sector = '$_GET[sector]'";
        
    
    }
    $order = "name";
    $where = "skipped = 0 $industrysql $sectorsql";
    
    $sql = "select $fields from $table where $where order by $order"; 

    global $wpdb;
    $q = $wpdb->get_results($sql);



    print "<table>";
    foreach($q as $key => $value){
        extract((array) $value);
        $url= linkThis($url,"$url");
        $twitter= linkThis($twitter,$twitter);
        $facebook= linkThis($facebook,$facebook);
        $linkedin= linkThis($linkedin,$linkedin);
        $crunchbase= linkThis($crunchbase,$crunchbase);
        print "<tr>
                
                <td>$title</td>
                <td>$description</td>
                <td>$twitter</td>
                <td>$facebook</td>
                <td>$linkedin</td>
                <td>$crunchbase</td>
                
                </tr>";
    }
    print "</table>";
?>