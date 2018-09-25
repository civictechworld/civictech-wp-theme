<? if(@$_GET['skip']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set skipped = 1  where id = '.$_GET['skip'];
    
    $q = $wpdb->query($set);
    
} else if(@$_GET['isArticle']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set isArticle = 1  where id = '.$_GET['isArticle'];
    
    $q = $wpdb->query($set);
    
   

} else if(@$_GET['dead']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set error404 = 1  where id = '.$_GET['dead'];
    
    $q = $wpdb->query($set);
    
   

} else if(@$_GET['isPDF']){
    global $wpdb;
  
    $set = 'UPDATE civictech_data set isPDF = 1  where id = '.$_GET['isPDF'];
    
    $q = $wpdb->query($set);
    
   

}?>