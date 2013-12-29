<?php
	$options[] = array( "name" => "Footer",
   						"sicon" => "footer.png",
						"type" => "heading");

    $options[] = array( "name" => "Footer Copyright Area",
    					"desc" => "You can change the footer copyright area.",
						"id" => $shortname."_footer_copyright",
						"std" => "Powered by <a href=http://wordpress.org/ title=A Semantic Personal Publishing Platform rel=generator>WordPress</a> &amp; designed and Coded by <a href=http://www.site5.com><?php _e('Site5 Web Hosting', 'site5framework'); ?>.</a> Site5 provides <a href=http://www.site5.com/p/wordpress/> WordPress Hosting</a> + <a href=http://www.site5.com/about/server-locations/> global hosting locations</a> around the world.",
						"type" => "textarea");

    $options[] = array( "name" => "Stats",
    					"sicon" => "stats.png",
						"type" => "heading");

    $options[] = array( "name" => "Stat Code",
    					"desc" => "You can use google analytics or other stats code in this area it will appear in the source.",
						"id" => $shortname."_stats",
						"std" => "",
						"type" => "textarea");
?>