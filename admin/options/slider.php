<?php
	$options[] = array( "name" => "Slider",
	                    "sicon" => "slider-32x32.png",
	                    "type" => "heading");
    
    $options[] = array( "name" => "Display Slider?",
                        "desc" => "Display slider on homepage",
                        "id" => $shortname."_displayslider",
                        "std" => "nivo",
                        "type" => "checkbox",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $sliders_array);
    
    $options[] = array( "name" => "Choose Slider",
                        "desc" => "Choose slider type for homepage",
                        "id" => $shortname."_slidertype",
                        "std" => "nivo",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $sliders_array);
    
    /*
    $options[] = array( "name" => "Number of Slider Items",
                        "desc" => "How many entries do you want to display?",
                        "id" => $shortname."_showslide",
                        "std" => "3",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $numberofs_array);
    */
    $options[] = array( "name" => "Slider effect",
                        "desc" => "Default is 'random'",
                        "id" => $shortname."_slidereffect",
                        "std" => "random",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $slidersfx_array);
						
    $options[] = array( "name" => "Animation Speed",
                        "desc" => "Default is 500",
                        "id" => $shortname."_slideranimationspeed",
                        "std" => "500",
                        "type" => "text");
    $options[] = array( "name" => "Animation Pause Time",
                        "desc" => "Default is 3000",
                        "id" => $shortname."_sliderpausetime",
                        "std" => "3000",
                        "type" => "text");
                        
    

?>