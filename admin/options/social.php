<?php 
$options[] = array( "name" => "Social",
						"sicon" => "social.png",
                        "type" => "heading");
                        
    $options[] = array( "name" => "Twitter username",
                        "desc" => "",
                        "id" => $shortname."_twitter_user",
                        "std" => "",
                        "type" => "text");
                        
    $options[] = array( "name" => "Display Header MouseOver Tip Latest Tweet",
                        "desc" => "",
                        "id" => $shortname."_latest_tweet",
                        "std" => "yes",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => array("yes"=>"yes","no"=>"no"));
                        
    $options[] = array( "name" => "Facebook Link",
                        "desc" => "",
                        "id" => $shortname."_facebook_link",
                        "std" => "",
                        "type" => "text");
                        
?>