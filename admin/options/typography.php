<?php 

    $options[] = array( "name" => "Typography",

    					"sicon" => "font.png",

						"type" => "heading");

                        

    $options[] = array( "name" => "Custom Headings Font",                     

                        "desc" => "This theme uses Google Web Font for headings. You can change it by entering the font details in the fields below.",

						"id" => $shortname."_customfontsinfo",

						"std" => "",

						"type" => "info");

                        

                        

    $options[] = array( "name" => "Enable Google Font",                     

                        "desc" => "By unchecking this the theme will use default font for headings, Arial.",

						"id" => $shortname."_customtypography",

						"std" => "0",

						"type" => "checkbox");



    $options[] = array( "name" => "Headings Google Font Link",

                        "desc" => "Ex: &lt;link href='http://fonts.googleapis.com/css?family=Chicle' rel='stylesheet' type='text/css'&gt;. Get it from <a href='http://www.google.com/webfonts'>Google Fonts</a>",

                        "id" => $shortname."_heading_font_link",

                        "std" => "",

                        "type" => "textarea");



    $options[] = array( "name" => "Headings Google Font Family",

                        "desc" => "Ex: font-family: 'Chicle', cursive;",

                        "id" => $shortname."_heading_font_family",

                        "std" => "",

                        "type" => "text");       

?>