<?php get_header(); 

/*
    THIS PAGE IS USED TO BUILD THE DB FOR COUNTRIES
*/
if(@$_GET['countries']){
    global $wpdb;
    $counter = 164;
    $file = "countries.json";
    print $json_path = plugin_dir_path( __FILE__ )."app/json/$file";
    print $json = file_get_contents($json_path);
    $country_array = json_decode($json, true);
    print "<br>";
    foreach($country_array as $key => $country){
       
       print $slug = strtolower($country['cca2']);
       print " | ";
       print $name = $country['name']['common'];
              print "<br>";
        $description = json_encode($country, true);
        $insert_taxonomy = array(
            "term_taxonomy_id" => $counter,
            "term_id" => $counter,
            "taxonomy" =>'countries',
            "description" => $description,
            "parent" => 0,
            "count" => 0
        );
        $insert_term = "INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES ('$counter', '$name', '$slug', '0');";
print "INSERTS DISABLED";
        //$wpdb->query($insert_term);
//$wpdb->insert("wp_term_taxonomy",$insert_taxonomy);
        print "<br>";
        print "<br>";
        
     print "<br>";
         $insert_tax = "INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES ('165', '165', 'countries', '".wp_json_encode($description)."', '0', '0');";
      

         print "<br>";
        print "<br>";$counter++;
       print "insert successfule";
         
            
        
    }

} else if(@$_GET['cities']){
    global $wpdb;
    $counter = 164;
      /*
    $file = "cities.json";
    print $json_path = plugin_dir_path( __FILE__ )."app/json/$file";
    $json = file_get_contents($json_path);
    $city_array = json_decode($json, true);
    print "<br>";
    print count($city_array);
    foreach($city_array as $key => $city){
       if($key == 1){
         print $name = $city['name']."<br>";
        print $slug = sanitize_title($city['name'])."<br>";
        print $description = json_encode($city, true);


       }
    }
    */

} else if(@$_GET['provinces']){
   
  
    global $wpdb;
    $sql="select distinct province, iso2, iso3, country from civictech_cities order by iso2, province";
    $q = $wpdb->get_results($sql);
    $counter = 1;
    foreach($q as $key => $value){
 
        extract((array) $value);
        if($province != "" && strlen($iso2)==2){
        print "$counter: $iso2, $iso3, $country | $province <BR>";
         $coords =getProvinceCoords($province,$iso2);
         
          $insert_province = array(
            "province" => $province,
            "iso2" => $iso2,
            "iso3" => $iso3,
            "country" => $country,
            "lat" => $coords['lat'],
            "lng" => $coords['lng']
        );   
      //  $wpdb->insert("civictech_provinces",$insert_province);
       
        $counter++;    
        }
    }

} else if (@$_GET['ctax'] ){

    global $wpdb;
    $sql="select t.name as label, t.slug, tt.description, tt.term_taxonomy_id as ttid, t.term_id as tid from wp_terms t, wp_term_taxonomy tt where t.term_id = tt.term_id and tt.taxonomy = 'countries' and t.term_id = 399 order by t.term_id";
    $q = $wpdb->get_results($sql);
    $counter = 1;
    print "<table>";
        foreach($q as $key => $value){
            extract((array) $value);
            $slug = strtoupper($slug);
            $country_data = (array) json_decode($description);
            $country_data['lat'] = number_format($country_data['latlng'][0],6);
            $country_data['lng'] = number_format($country_data['latlng'][1],6);
            
            $country_data['provinces'] = getProvinces($slug);
            $country_data['cities']= getCities($slug);
            $description = json_encode($country_data);
            print "<tr><td>$ttid</td>";
            print "<td>$label</td>";
            print "<td>$slug</td>";
        
            print "<td>";
           // print var_dump($country_data['provinces'] );
            print "</td>";
            print "<td>";
             var_dump($country_data );
            
            print "</tr>";
            /*  
            //comment this out when inactive
            $wpdb->update('wp_term_taxonomy',
                 array("description"=>json_encode($country_data)),
                array("term_taxonomy_id"=>$ttid)
            );
          */
            
        
            
        }
    print "<table>";
}
function getCities($iso2){
    global $wpdb;
    $sql = "SELECT * from civictech_cities WHERE iso2 ='$iso2'";
    
    $q = $wpdb->get_results($sql);
    $counter = 0;
    $lat_count = 0;
    $lng_count = 0;
    $cities = array();
    foreach($q as $key => $value){
        extract((array) $value);
    
      $sql = "select abbr from civictech_provinces where province = '".addslashes($province)."' and iso2 = '".strtoupper($iso2)."'";

        $abbr = $wpdb->get_var($sql);
        array_push($cities,array(
            "id" => $id,
            "name" => $name,
            "lat" => $lat,
            "lng" => $lng,
            "pop", intval($population),
            "abbr"=>$abbr,
            "province"=>$province
        ));
  
        
    }
    return $cities;

}
function getProvinces($iso2){
    global $wpdb;
    $sql = "SELECT * from civictech_provinces WHERE iso2 ='$iso2'";
   
    $q = $wpdb->get_results($sql);
    $counter = 0;
    $lat_count = 0;
    $lng_count = 0;
    $provinces = array();
    foreach($q as $key => $value){
        extract((array) $value);
        array_push($provinces,array(
            "id" => $id,
            "name" => $province,
            "lat" => $lat,
            "lng" => $lng,
            "abbr" => $abbr
        ));
        
        
    }
    return $provinces;

}

function getProvinceCoords($province,$iso2){
 global $wpdb;
    $sql="select lat, lng, name from civictech_cities where province = '$province' and iso2 = '$iso2' order by name";
    $q = $wpdb->get_results($sql);
    $counter = 0;
    $lat_count = 0;
    $lng_count = 0;
    foreach($q as $key => $value){
 
        extract((array) $value);
        $lat = floatval($lat);
        $lng = floatval($lng);
        print $counter." $name : $lat.". $lat_count +=floatval($lat) ." ". $lng." ". $lng_count +=floatval($lng)  ;
        print "<BR>";
        $counter++;    
    }
    return array(
        "lat"=>floatval($lat_count/$counter),
        "lng" => floatval($lng_count/$counter)
        );


}



 get_footer(); ?>