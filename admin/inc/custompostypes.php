<?php
/*********************************************************************************************

Registers Custom Slider Post Type

*********************************************************************************************/
function wpt_slider_posttype() {

$labels = array(
    'name' 					=> __( 'Slider', 'site5framework' ),
    'singular_name' 		=> __( 'Slider Item', 'site5framework' ),
    'add_new' 				=> __( 'Add New Item', 'site5framework' ),
    'add_new_item' 			=> __( 'Add New Slider Item', 'site5framework' ),
    'edit_item' 			=> __( 'Edit Slider Item', 'site5framework' ),
    'new_item' 				=> __( 'Add New Slider Item', 'site5framework' ),
    'view_item'				=> __( 'View Item', 'site5framework' ),
    'search_items' 			=> __( 'Search Slider', 'site5framework' ),
    'not_found' 			=> __( 'No slider items found', 'site5framework' ),
    'not_found_in_trash' 	=> __( 'No slider items found in trash', 'site5framework' )
);

$args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
    'supports' 				=> array( 'title','post-thumbnails' ),
    'capability_type' 		=> 'post',
    'rewrite' 				=> array("slug" => "sliderpost"), // Permalinks format
    'menu_position' 		=> 5,
    'has_archive' 			=> true
);

register_post_type( 'sliderpost', $args);
}

add_action( 'init', 'wpt_slider_posttype' );


add_theme_support( 'post-thumbnails');
set_post_thumbnail_size( 255, 90, false );
add_image_size('featured-post-thumbnail',430,280,true);
add_image_size('slider-thumbnail',940,370,true);
add_image_size('slider-display-thumbnail',470,92,true);


//  Add Columns to slider edit screen

function slider_edit_columns($slider_columns){
	$slider_columns = array(
		"cb" 				=> "<input type=\"checkbox\" />",
		"title" 			=> __('Title', 'site5framework'),
        "slidelink" 		    => __('Link To', 'site5framework'),
		"featured_thumbnail" 		=> __('Thumbnail', 'site5framework'),
	);
	
	return $slider_columns;
}

add_filter('manage_edit-sliderpost_columns', 'slider_edit_columns');

function slider_columns_display($slider_columns, $post_id){

	switch ($slider_columns)

	{
	        case "slidelink":
			echo get_post_meta($post_id, 'journals_slidelink', true);
			break;
            
            
            case "featured_thumbnail":
			$width = (int) 35;
			$height = (int) 35;
			$thumbnail_src = get_post_meta( $post_id, 'journals_slideimage_src', true );


			// Display the featured image in the column view if possible
			if ($thumbnail_src) {
				$thumb = '<img src="'.$thumbnail_src.'" alt="" style="width: 470px;" />';
			}
			if ( isset($thumb) ) {
			     echo $thumb;
			} else {
				echo __('None', 'site5framework');
			}
			break;
	}
}
add_action('manage_posts_custom_column', 'slider_columns_display', 10, 2);
// Sets posts displayed per slider page to 9 -- Feel free to change

function wpt_slider_custom_posts_per_page( &$q ) {
	if ( get_post_type() == 'sliderpost' )
		$q->set( 'posts_per_page', 9 );
	return $q;
}

add_filter('parse_query', 'wpt_slider_custom_posts_per_page');

// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_slider_icons' );

function wpt_slider_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-slider .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-slider {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-32x32.png) no-repeat;}
    </style>
<?php }



?>