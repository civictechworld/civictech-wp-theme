   
   <form method="post" action="#">
    <input type="hidden" name="id" value="<?=$_GET['key']?>">
    <input type="hidden" name="scraped" value="1">
    <input type="hidden" name="error400" value="0">
<table id="scraper-form" width="100%">

<tr><th>Field</th><td>Scrape Data</td><td><input type='submit' class="save" value="SAVE"></td></tr>
   <?php
   
	$fields = "URL,title,description,keywords,language,logo_url,share_image_url,contact_url,blog_url,twitter,facebook,linkedin,github,tumblr,google_plus,medium,telegram,slack,skype,instagram,youtube,vimeo,pinterest,behance,rss,email,phone,address,address2,city,state,postal_code,country,url_content";
				
    foreach(explode(",",$fields) as $key => $field){
       $label = ucfirst(str_replace("_"," ",$field));
        $field_value = trim(@$this_link[$field]);
        $scrape_value = trim(@$$field);
        $field_class = 'scrape-data';
      

       if(@$this_link[$field] == ""){
         if(@$this_link[$field] != $scrape_value){
              $field_class .= ' diff'; 
         }

        $field_value = @trim($scrape_value);
       }

       print "<tr>";

       print '<td class="form-field">'.$label.'</td>';
       
       print '<td class="'.$field_class.'">'.@substr(wordwrap($scrape_value,25,"<br>"),0,200).'</td>
           <td class="form-container">';
    
       if($field == 'description' || $field == 'url_content'){
        
            print '<textarea name="'.$field.'" rows="10">'.@$field_value.'</textarea>';
       } else if ($field == 'URL'){     
            print '<input type="text" name="'.$field.'" value="'.@$_GET['url'].'">';
 
       } else {

            print '<input type="text" name="'.$field.'" value="'.@$field_value.'">';

       }



       print "</td>
       </tr>";
       

    }
    
    ?>

    <tr><td></td><td></td><td><input type='submit' class="save" value="SAVE"></td></tr>

</table>
</form>