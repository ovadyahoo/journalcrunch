<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");


    $options[] = array( "name" => "Your Company Logo",
                        "desc" => "You can use your own company logo. Click to 'Upload Image' button and upload your logo.",
                        "id" => $shortname."_clogo",
                        "std" => "$blogpath/logo.png",
                        "type" => "upload");
                        
    $options[] = array( "name" => "Text as Logo",
                        "desc" => "If you don't upload your own company logo, this text will show up in it's place.",
                        "id" => $shortname."_clogo_text",
                        "std" => "JournalCrunch",
                        "type" => "text");
						
    $options[] = array( "name" => "Custom Favicon",
                        "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your favicon.",
                        "id" => $shortname."_custom_shortcut_favicon",
                        "std" => "",
						"class" => "sectionlast",
                        "type" => "upload");
                        
    $options[] = array( "name" => "Homepage featured posts",
                        "desc" => "To have posts featured you just need to add tag 'featured' to the post. This works only if the slider is not displayed.",
                        "id" => $shortname."_featuredhomeposts",
                        "std" => "2",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $featuredhomeposts_array);
                        
    
    $options[] = array( "name" => "Homepage posts",
                        "desc" => "On the homepage you can display specific posts, tagged with 'homepost'. If there are no such posts, latest post will be displayed.",
                        "id" => $shortname."_homeposts",
                        "std" => "6",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $homeposts_array);
                        
    $options[] = array( "name" => "Way to display posts on category pages",
                        "desc" => "",
                        "id" => $shortname."_box_model",
                        "std" => "box",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => array("normal"=>"normal","box"=>"box"));
    
?>