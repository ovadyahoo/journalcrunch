<?php
/*********************************************************************************************

WP_Hooks - Enqueue Javascripts

*********************************************************************************************/
function site5framework_header_init() {
    if (!is_admin()) {
	wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'modernizr' );
    wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr-all-css3.js');
    wp_enqueue_script( 'modernizr' );
    wp_deregister_script( 'prettyphoto' );
    wp_register_script( 'prettyphoto', get_template_directory_uri().'/js/prettyphoto/jquery.prettyPhoto.js');
    wp_enqueue_script( 'prettyphoto' );
    wp_register_style( 'prettyphoto-style', get_template_directory_uri().'/js/prettyphoto/css/prettyPhoto.css');
    wp_enqueue_style( 'prettyphoto-style' );

    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css');
	wp_enqueue_style('boxes', get_template_directory_uri().'/lib/shortcodes/css/boxes.css');
	wp_enqueue_style('lists', get_template_directory_uri().'/lib/shortcodes/css/lists.css');
	wp_enqueue_style('social', get_template_directory_uri().'/lib/shortcodes/css/social.css');
	wp_enqueue_style('dropcaps', get_template_directory_uri().'/lib/shortcodes/css/dropcaps.css');
	wp_enqueue_style('viewers', get_template_directory_uri().'/lib/shortcodes/css/viewers.css');
	wp_enqueue_style('tabs', get_template_directory_uri().'/lib/shortcodes/css/tabs.css');
	wp_enqueue_style('toggles', get_template_directory_uri().'/lib/shortcodes/css/toggles.css');
	wp_enqueue_style('site5_buttons', get_template_directory_uri().'/lib/shortcodes/css/buttons.css');
	wp_enqueue_style('columns', get_template_directory_uri().'/lib/shortcodes/css/columns.css');
    wp_enqueue_script('button', get_template_directory_uri().'/lib/shortcodes/js/buttons.js');
	wp_enqueue_script('quovolver', get_template_directory_uri().'/lib/shortcodes/js/jquery.quovolver.js');
	wp_enqueue_script('cycle', get_template_directory_uri().'/lib/shortcodes/js/jquery.cycle.all.min.js');

	wp_deregister_script( 'ddsmoothmenu' );
	wp_register_script('ddsmoothmenu', get_template_directory_uri().'/js/ddsmoothmenu.js');
	wp_enqueue_script( 'ddsmoothmenu' );
    wp_enqueue_style('ddsmoothmenu', get_template_directory_uri().'/css/ddsmoothmenu.css');

}
}
add_action('init', 'site5framework_header_init');

/*********************************************************************************************

Admin Hooks / Portfolio and Slider Media Uploader

*********************************************************************************************/
function site5framework_mediauploader_init() {
    if (is_admin()) {
    wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('mediauploader', get_template_directory_uri().'/admin/js/mediauploader.js', array('jquery','media-upload','thickbox'));
}
}
add_action('init', 'site5framework_mediauploader_init');


/*********************************************************************************************

Favicon

*********************************************************************************************/
function site5framework_custom_shortcut_favicon() {
	if (of_get_option('journal_custom_shortcut_favicon') != '') {
    echo '<link rel="shortcut icon" href="'. of_get_option('journal_custom_shortcut_favicon') .'" type="image/ico" />'."\n";
	}
	else { ?><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/favicon.ico" type="image/ico" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_shortcut_favicon');


/*********************************************************************************************

Icon

*********************************************************************************************/
function site5framework_custom_icon() {
	if (of_get_option('journal_custom_shortcut_favicon') != '') {
    echo '<link rel="icon" href="'. of_get_option('journal_custom_shortcut_favicon') .'" type="image/ico" />'."\n";
	}
	else { ?><link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/favicon.ico" type="image/ico" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_icon');

/*********************************************************************************************

Apple Touch Icon

*********************************************************************************************/
function site5framework_custom_apple_touch_icon() {
	if (of_get_option('journal_custom_apple_touch_icon') != '') {
    echo '<link rel="apple-touch-icon" href="'. of_get_option('journal_custom_apple_touch_icon') .'" type="image/png" />'."\n";
	}
	else { ?><link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/apple_icon.png" type="image/png" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_apple_touch_icon');


/*********************************************************************************************

Apple Touch Icon Precomposed

		<link href="ico/speed-dial.png" rel="icon" type="image/png" />
*********************************************************************************************/
function site5framework_custom_apple_touch_icon_precomposed() {
	if (of_get_option('journal_custom_apple_touch_icon') != '') {
    echo '<link rel="apple-touch-icon-precomposed" href="'. of_get_option('journal_custom_apple_touch_icon') .'" type="image/png" />'."\n";
	}
	else { ?><link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/apple_icon.png" type="image/png" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_apple_touch_icon_precomposed');


/*********************************************************************************************

Custom Icon

*********************************************************************************************/
function site5framework_custom_icon_image() {
	if (of_get_option('journal_custom_icon_image') != '') {
    echo '<link rel="icon" href="'. of_get_option('journal_custom_icon_image') .'" type="image/png" />'."\n";
	}
	else { ?><link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/apple_icon.png" type="image/png" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_icon_image');


/*********************************************************************************************

Contact Form JS

*********************************************************************************************/
function site5framework_contactform_init() {
	if (is_page_template('contact.php') && !is_admin()) {
    wp_enqueue_script('contactform', get_template_directory_uri().'/js/contactform/contactform.js', array('jquery'), '1.0');
    }
}
add_action('template_redirect', 'site5framework_contactform_init');



/*********************************************************************************************

Stats

*********************************************************************************************/
function site5framework_analytics(){
	$output = of_get_option('journal_stats');
	if ( $output <> "" )
	echo stripslashes($output) . "\n";
}
add_action('wp_footer','site5framework_analytics');


/*********************************************************************************************

Nivo Slider

*********************************************************************************************/
function nivo_home_js() {
    if (is_home() && of_get_option('journal_slidertype') == 'nivo' && !is_admin()) {
        wp_enqueue_script('nivo-slider', get_template_directory_uri().'/js/jquery.nivo.slider.pack.js');
        wp_enqueue_style('nivo-slider', get_template_directory_uri().'/css/nivo-slider.css');
        ?>
    <?php
    }
}
add_action('wp_footer', 'nivo_home_js');

/*********************************************************************************************

Nivo Slider

*********************************************************************************************/
function custom_js() {
    if (!is_admin()) {
        wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js');
        ?>
    <?php
    }
}
add_action('wp_footer', 'custom_js');
?>