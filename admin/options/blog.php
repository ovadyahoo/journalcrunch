<?php
    $options[] = array( "name" => "Blog",
    					"sicon" => "blog.png",
						"type" => "heading");

    $options[] = array( "name" => "Blog Post Category",
						"desc" => "Select blog category for blog section.",
						"id" => $shortname."_blogcat",
                        "type" => "select",
                        "options" => $options_categories);

    $options[] = array( "name" => "Number of Posts",
						"id" => $shortname."_blognumposts",
						"std" => "6",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => $numberofs_array);
?>