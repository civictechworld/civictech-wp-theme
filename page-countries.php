<?php get_header(); 


$countries = getCountriesTags();
$country_array = array();
foreach($countries as $iso2 =>$country){
   
    extract((array) $country);
    
 
    
    $provinces_array=array();
    foreach($provinces as $key => $province){
       
        array_push($provinces_array,$province['name']);
    }
   
    $cities_array=array();
    $city_state_array=array();
    
    foreach($cities as $key => $city){
        array_push($cities_array,$city['name']);
        
        if($city['abbr'] != ''){
            array_push($city_state_array, $city['name'].", ".$city['abbr']);

            
        }
      
    

    }
    $country_array[$iso2] = array(
        "id"=>$tid,
        "name"=>$name,
        "official"=>$official,
        "iso3" => $iso3,
        "provinces" => $provinces_array,
        "cities" => $cities_array,
        "city_states" => $city_state_array
        
           
    );


}


print "RENDER:". $server_path = get_template_directory()."/app/json/locations.json?=1";
  print $json = json_encode($country_array);
    writeJSON($json,$server_path);
get_footer(); ?>