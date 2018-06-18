<?php

get_header(); ?>


    <table>
    <tr>
        <td width="20%">
            <h3>NOT YET TAGGED</h3>
            <div style="height:600px; overflow-y:scroll">
            <?=listProjects("resource","wp_post_id > 0")?>
            </div>
            <BR><BR>
            <!--
            <h3>TAGGED</h3>
            <div style="height:400px; overflow-y:scroll">
            <?php 
                // print listProjects("resource","wp_post_id > 0 ")
                ?>
            </div>
            -->
        </td>
        <td valign="top" width="30%">

            <h3>SELECTED</h3>

            <?php 
                if(@$_GET['resource']){
                    extract(getTags("purpose,process",$_GET['resource']));
              

              $path=  get_stylesheet_directory()."/app/json/locations.json";
               $json = file_get_contents($path);
               $locations = (array) json_decode($json);

               var_dump(tagLocations($locations,$url_content));
   
                }

                ?>
            
        </td>
        <td>
                
            <?php
             if(@$_GET['resource']){
            echo "Keywords detected: ".beliefmedia_keywords($url_content, $min_word_length = 3, $min_word_occurrence = 2, $as_array = false, $max_words = 8, $restrict = false);
            $content_array = parseContent($url_content);
            }

            ?>

        </td>
            </tr>
            </table>

<?php get_footer(); ?>