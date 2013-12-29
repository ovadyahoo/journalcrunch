<?php
/*********************************************************************************************

This theme uses wp_nav_menu() in one location.

*********************************************************************************************/

function fallbackmenu(){
	echo'<nav>';
    echo'<ul id="menu-top">';
    wp_list_pages('title_li=');
    echo'</ul>';
	echo'</nav>';
}

register_nav_menus( array(
        'primary' => __( 'Primary Navigation', '' ),
    ) );
?>