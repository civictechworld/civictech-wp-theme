<?php

    function getStat($sql,$total=0){
        global $wpdb;
       $wpdb->get_results($sql);
        $count = intval($wpdb->num_rows);
        if($total>0){
            return $count." / ".intval(($count/$total)*100)."%";
        } else {
            return $count;
        }
        
        
    }

    function getStats(){
        $scraped = getStat("select id from civictech_data where scraped = 1");
print        $total = getStat("select id from civictech_data");
print "-".        $no_link = getStat("select id from civictech_data where no_link = 1",$total);
        $links = intval($total-$no_link);
        $hyperlinks = $links." / ".intval(($links/$total)*100)."%";
            
        return array(
            "total"=>$total,
            "original_records"=>getStat("select id from civictech_data where old_key>0",$total),
            "added"=>getStat("select id from civictech_data where old_key=0",$total),
            "acquired"=>getStat("select id from civictech_data where acquired = 1",$total),
            "pivoted"=>getStat("select id from civictech_data where pivoted = 1",$total),
            "defunct"=>getStat("select id from civictech_data where defunct = 1",$total),
                        "skipped"=>getStat("select id from civictech_data where skipped = 1"),
             "no_link"=>getStat("select id from civictech_data where no_link = 1"),
            "error404"=>getStat("select id from civictech_data where error404 = 1"),






            

            "no_link"=>$no_link,
            "hyperlink"=>getStat("select id from civictech_data url <> ''"),
            "description"=>getStat("select id from civictech_data where description <> ''"),
            "keywords"=>getStat("select id from civictech_data where keywords <> ''"),
            "language"=>getStat("select id from civictech_data where language <> ''"),
            "logo_url"=>getStat("select id from civictech_data where logo_url <> ''"),
            "share_image_url"=>getStat("select id from civictech_data where share_image_url <> ''"),
            "logo_svgtag"=>getStat("select id from civictech_data where logo_svgtag <> ''"),
            "contact_url"=>getStat("select id from civictech_data where contact_url <> ''"),
            "blog_url"=>getStat("select id from civictech_data where blog_url <> ''"),
            "twitter"=>getStat("select id from civictech_data where twitter <> ''"),
            "facebook"=>getStat("select id from civictech_data where facebook <> ''"),
            "linkedin"=>getStat("select id from civictech_data where linkedin <> ''"),
            "github"=>getStat("select id from civictech_data where github <> ''"),
            "medium"=>getStat("select id from civictech_data where medium <> ''"),
            "slack"=>getStat("select id from civictech_data where slack <> ''"),
            "telegram"=>getStat("select id from civictech_data where telegram <> ''"),
            "skype"=>getStat("select id from civictech_data where skype <> ''"),
            "instagram"=>getStat("select id from civictech_data where instagram <> ''"),
            "youtube"=>getStat("select id from civictech_data where youtube <> ''"),
            "vimeo"=>getStat("select id from civictech_data where vimeo <> ''"),
            "tumblr"=>getStat("select id from civictech_data where tumblr <> ''"),
            "google_plus"=>getStat("select id from civictech_data where google_plus <> ''"),
            "pinterest"=>getStat("select id from civictech_data where pinterest <> ''"),
            "behance"=>getStat("select id from civictech_data where behance <> ''"),
            "flickr"=>getStat("select id from civictech_data where flickr <> ''"),
            "rss"=>getStat("select id from civictech_data where rss <> ''"),
            "email"=>getStat("select id from civictech_data where email <> ''"),
            "phone"=>getStat("select id from civictech_data where phone <> ''"),
            "address"=>getStat("select id from civictech_data where address <> ''"),
            "address2"=>getStat("select id from civictech_data where address2 <> ''"),
            "city"=>getStat("select id from civictech_data where city <> ''"),
            "state"=>getStat("select id from civictech_data where state <> ''"),
            "postal_code"=>getStat("select id from civictech_data where postal_code <> ''"),
            "country"=>getStat("select id from civictech_data where country <> ''"),
            "location_country"=>getStat("select id from civictech_data where location_country>0"),
            "location_province"=>getStat("select id from civictech_data where location_province <> ''"),
            "location_city"=>getStat("select id from civictech_data where location_city <> ''"),
            "city_id"=>getStat("select id from civictech_data where city_id>0"),
            "state_id"=>getStat("select id from civictech_data where state_id>0"),
            "country_id"=>getStat("select id from civictech_data where country_id>0"),
            "url_content"=>getStat("select id from civictech_data where url_content <> ''"),
            "scraped"=>getStat("select id from civictech_data where scraped = 1"),
            "error400"=>getStat("select id from civictech_data where error400 = 1"),
            "jobs_url"=>getStat("select id from civictech_data where jobs_url <> ''"),
            "apply_url"=>getStat("select id from civictech_data where apply_url <> ''"),
            "events_url"=>getStat("select id from civictech_data where events_url <> ''"),
            "conference_url"=>getStat("select id from civictech_data where conference_url <> ''"),
            "isPDF"=>getStat("select id from civictech_data where isPDF = 1"),
            "isFacebook"=>getStat("select id from civictech_data where isFacebook = 1"),
            "isTwitter"=>getStat("select id from civictech_data where isTwitter = 1"),
            "isLinkedIn"=>getStat("select id from civictech_data where isLinkedIn = 1"),
            "isWikipedia"=>getStat("select id from civictech_data where isWikipedia = 1"),
            "isMedium"=>getStat("select id from civictech_data where isMedium = 1"),
            "isArticle"=>getStat("select id from civictech_data where isArticle = 1"),
            "isWayBackMachine"=>getStat("select id from civictech_data where isWayBackMachine = 1"),
            "toDelete"=>getStat("select id from civictech_data where toDelete = 1"),
            "modified"=>getStat("select id from civictech_data where modified = 1"),
            "link_added"=>getStat("select id from civictech_data where link_added = 1"),
            "update_failed"=>getStat("select id from civictech_data where update_failed = 1"),
            "update_code"=>getStat("select id from civictech_data where update_code <> ''")
        );

    }
?>