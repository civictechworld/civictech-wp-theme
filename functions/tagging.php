<?php

    function getCountriesTags($and=""){
    global $wpdb;
        $sql="select t.name as label, t.slug, tt.description, tt.term_taxonomy_id as ttid, t.term_id as tid from wp_terms t, wp_term_taxonomy tt where t.term_id = tt.term_id and tt.taxonomy = 'countries' $and order by t.term_id";
        $q = $wpdb->get_results($sql);
        $counter = 1;
        $countries = array();

        foreach($q as $key => $value){
            extract((array) $value);
            $slug = strtoupper($slug);
            $countries[$slug] = array();
            $countries[$slug]['name']= $label;
            $countries[$slug]['tid']= $tid;
            
            
            
            $country_data = (array) json_decode($description);
        
            $countries[$slug]['lat']= $country_data['lat']; 
            $countries[$slug]['lng']= $country_data['lng'];
            $countries[$slug]['iso3'] = $country_data['cca3'];
            $countries[$slug]['official'] = $country_data['name']->official;
            $countries[$slug]['provinces'] = extractProvinces($country_data['provinces']);
            $countries[$slug]['cities'] = extractProvinces($country_data['cities']);
            

            
        }
        return $countries;        
    
    }
    function extractProvinces($provinces){
        $province_data = array();
        global $wpdb;
        foreach($provinces as $key=> $province){

            extract((array) $province);
                        
            
            array_push($province_data,array(
                "id"=>$id,
                "name" => $name,
                "lat" =>$lat,
                "lng" => $lng,
                "abbr" =>$abbr
                )
            );
            
        }
        
        return $province_data;

    }

    function getTags($taxonomies,$resource_id){
        $taxonomies = explode(",",$taxonomies);
         global $wpdb;
         $record = $wpdb->get_row("SELECT `wp_post_id`, url_content FROM `civictech_data` WHERE id = $resource_id");
            
            $post_id = $record->wp_post_id;
            $url_content = $record->url_content;

            $occurences = array();
        foreach($taxonomies as $key => $taxonomy){
          

                $sql="select t.term_id as tid, t.name, t.slug from wp_terms t, wp_term_taxonomy tt where tt.taxonomy = '$taxonomy' and t.term_id = tt.term_id";
                $q = $wpdb->get_results($sql);
                $counter = 1;
                print "<h3>$taxonomy</h3>";                
                print "<table>";
                    

                    foreach($q as $key => $value){
                        extract((array) $value);
                        $found = 0;
                        $count = substr_count ($url_content,trim(strtolower($name)));

                    
                            
                        if($count > 0){
                                array_push($occurences,array(
                                "id"=>$tid,
                                "name"=>$name,
                                "taxonomy"=>$taxonomy,
                                "count"=>$count));
                            print "<tr>
                            <td>";
                                print    "$tid $name ($count)";
                                

                            print "
                                </td>
                            </tr>";
                        }
                }
                

                print "<table>";
            } 
        return array(
            "url_content"=>$url_content,
            "occurences"=>$occurences,
            "post_id"=>$post_id
            );
    }
    function findTag($match="",$url_content){
        $count = 0;
        foreach(explode(",",$match) as $key => $string){
            substr_count ($url_content,trim(strtolower($string)));
        }
        return $count; 
    }

    function tagLocations($locations,$url_content){
            $tags = array();
            foreach($locations as $iso2=>$country){
                
                extract((array) $country);
                
               
                
               $country_strings = "$iso2,$iso3,$official,$name";
                if($count = count(findTag($name,$url_content))){
                    //print "$name<BR>";
                
                    array_push($tags,array(
                        
                        "location" => $name,
                        "count" => $count
                        
                        )
                    );
                }


                if(count($provinces)){
                    foreach($provinces as $key =>$province){
                        //print "$province<BR>";
                        
                       

                        if($count = count(findTag($province,$url_content))){
                            array_push($tags,array(
                                "location" =>$province,
                                "count" => $count
                                
                            ));
                        }
                    }
                }
                if(count($cities)){
                    foreach($cities as $key =>$city){
                        //print "$province<BR>";
                        
                       

                        if($count = count(findTag($city,$url_content))){
                            array_push($tags,array(
                                "location" =>$city,
                                "count" => $count
                                
                            ));
                        }
                    }
                    
                }
             
            }
          
            return $tags;

    }

    function beliefmedia_keywords($string, $min_word_length = 3, $min_word_occurrence = 2, $as_array = false, $max_words = 8, $restrict = false) {
    
    function keyword_count_sort($first, $sec) {
        return $sec[1] - $first[1];
    }
    
    $string = preg_replace('/[^\p{L}0-9 ]/', ' ', $string);
    $string = trim(preg_replace('/\s+/', ' ', $string));
        
    $words = explode(' ', $string);
    
    /* 	
        Only compare to common words if $restrict is set to false
        Tags are returned based on any word in text
        If we don't restrict tag usage, we'll remove common words from array 
    */
    
    if ($restrict === false) {
        $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','home','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
        $words = array_udiff($words, $commonWords,'strcasecmp');
    }
    
    /* Restrict Keywords based on values in the $allowedWords array */
    if ($restrict !== false) {
        $allowedWords =  array('engine','boeing','electrical','pneumatic','ice');
        $words = array_uintersect($words, $allowedWords,'strcasecmp');
    }
    
    $keywords = array();
    
    while(($c_word = array_shift($words)) !== null) {
    
        if (strlen($c_word) < $min_word_length) continue;
        $c_word = strtolower($c_word);
    
            if (array_key_exists($c_word, $keywords)) $keywords[$c_word][1]++;
            else $keywords[$c_word] = array($c_word, 1);
    }
    
    usort($keywords, 'keyword_count_sort');
    $final_keywords = array();
    
    foreach ($keywords as $keyword_det) {
        if ($keyword_det[1] < $min_word_occurrence) break;
        array_push($final_keywords, $keyword_det[0]);
    }
        
    $final_keywords = array_slice($final_keywords, 0, $max_words);
    
    return $as_array ? $final_keywords : implode(', ', $final_keywords);
    }
    function parseContent($url_content){
        
        return explode(" ",$url_content);
        foreach($content_array as $key => $word){
            if(trim($word) != ''){
                print "$word, ";
            }
        }
    }
?>