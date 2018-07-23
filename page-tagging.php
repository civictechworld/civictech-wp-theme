<?php get_header(); ?>



    <table>
    <tr>
        <!--
        <td width="20%">
            <h3>NOT YET TAGGED</h3>
            <div style="height:600px; overflow-y:scroll">
            <?=listProjects("resource","wp_post_id > 0")?>
            </div>
            <BR><BR>
            
            <h3>TAGGED</h3>
            <div style="height:400px; overflow-y:scroll">
            <?php 
                // print listProjects("resource","wp_post_id > 0 ")
                ?>
            </div>
           
        </td>
 -->
        <td valign="top">

            

            <?php 

/*
  echo "Keywords detected: ".beliefmedia_keywords($content, $min_word_length = 3, $min_word_occurrence = 2, $as_array = false, $max_words = 8, $restrict = false);
            print "<Br>in: <BR>" ;
            $content_array = parseContent($content);
                foreach($content_array as $key => $word){
                    print "$word<br>";
                }
                if(@$_GET['resource']){
                    extract(getTags("purpose,process",$_GET['resource']));
              
              $path=  get_stylesheet_directory()."/app/json/locations.json";
               $json = file_get_contents($path);
               $locations = (array) json_decode($json);

              }
*/



            if(@$_GET['review'] == 1){
               global $wpdb;
                $sql = "select url_content from civictech_data where url_content <> '' limit 0, 1";
               $q = $wpdb->get_results($sql);
               $content = "";
               foreach($q as $key=>$value){
                   $content_array = explode(" ",$value->url_content);
                 $content .= implode("<br>",$content_array);
               }
               
            }
             if(@$_GET['results']){
                print '<h3>REVIEW</h3>';

               global $wpdb;
                $sql = "select id, name, title, description,keywords, url, parent, term, category_label, logo_url, url_content from civictech_data where title <>''";
               $q = $wpdb->get_results($sql);
               $content = "";
               print "<table id='results'>";
               foreach($q as $key=>$value){
                    extract((array) $value);
                    print "<tr><td><a href='/admin/scrape/?scrape=1&key=$id&url=$url' target='_blank'>$id</a> </td><td><a href='$url' target='_blank'> $title</a></td><td>$description</td><td>$keywords</td><td". ' title="'.htmlspecialchars(trim($url_content)).'"'.">$category_label</td><td width='300'><img src='$logo_url'></td></tr>";


               }
               print "</table>";
               
            }

             if(@$_GET['keywords']){
                print '<h3>keywords</h3>';

               global $wpdb;
                $sql = "select id, name, title, description, keywords, url, parent, term, category_label, logo_url, url_content from civictech_data where title <>'' and keywords <> ''";
               $q = $wpdb->get_results($sql);
               $content = "";
               print "<table id='results'>";
               foreach($q as $key=>$value){
                    extract((array) $value);
                    /*
                    print "<tr><td><a href='/admin/scrape/?scrape=1&key=$id&url=$url' target='_blank'>$id</a> </td><td><a href='$url' target='_blank'> $title</a></td><td>$description</td><td>$keywords</td><td". ' title="'.htmlspecialchars(trim($url_content)).'"'.">$category_label</td><td width='300'><img src='$logo_url'></td></tr>";
                    */
                               $keyword_array[] = $keywords; 


               }
               $keywords =explode(",",trim(implode(",",array_unique(explode(",",implode(", ",$keyword_array))))));
              print "<td>";
               foreach($keywords as $key =>$value){
                   print "$value<br>";
               }
              print "</td>";
               print "</table>";
               
            }
            



         

              

                ?>
            
        </td>
        <!--
        <td>
                
            <?php /*
             if(@$_GET['resource']){
            echo "Keywords detected: ".beliefmedia_keywords($url_content, $min_word_length = 3, $min_word_occurrence = 2, $as_array = false, $max_words = 8, $restrict = false);
            print "<Br>in: <BR>" ;
            $content_array = parseContent($url_content);
                foreach($content_array as $key => $word){
                    print "$word ";
                }
            print "<BR><BR><BR>";
 $location_tags = tagLocations($locations,$url_content);
                    if(count($location_tags)){
                         foreach($location_tags as $key => $location){
                             if($location['count']){
                              print "$location[location], ";
                           }
                        }
                    }

                }
                */
             
           
            ?>

        </td>-->
            </tr>
            </table>
<?php get_footer(); ?>