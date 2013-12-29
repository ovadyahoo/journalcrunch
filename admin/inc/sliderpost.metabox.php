<?php
$prefix = 'journals_';

$meta_box = array(
	'id' => 'sliderpostbox',
	'title' => 'Slider Listing Details',
	'page' => 'sliderpost',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

        array(
			'name' => 'Slide Caption',
			'desc' => '',
			'id' => $prefix . 'slidecaption',
			'type' => 'text',
			'std' => ''
		),

		array(
			'name' => 'Slide Image Link',
			'desc' => '',
			'id' => $prefix . 'slidelink',
			'type' => 'text',
			'std' => ''
		),


		array(
			'name' => 'Add Slider Image',
            'desc' => 'Please make sure that the image size is 940px x 370px.',
			'id' => $prefix . 'slideimage',
			'type' => 'upload',
			'std' => ''
		),


        array(
			'name' => '',
			'id' => $prefix . 'slideimage_src',
			'type' => 'hidden',
			'std' => ''
		)


	),

);


add_action('admin_menu', 'journalcrunch_add_box');

// Add meta box
function journalcrunch_add_box() {
	global $meta_box;

	add_meta_box($meta_box['id'], $meta_box['title'], 'journalcrunch_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function journalcrunch_show_box() {
	global $meta_box, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="journalcrunch_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';

	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);

		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
            case 'hidden':
                echo '<img src="', $meta ? $meta : $field['std'], '" id="', $field['id'], '_img" style="width:600px"/>';
				echo '<input type="hidden" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;

			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
			case 'textarea':
				echo '<textarea class="theEditor" name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];

				break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>',
				'<br />', $field['desc'];
				break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
            case "upload":
            echo '<div class="upload_button_div"> <span id="', $field['id'], '"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Media</a></b> </span><br />'.$field['desc'].'</div>';
                break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}

	echo '</table>';
}

add_action('save_post', 'journalcrunch_save_data');

// Save data from meta box
function journalcrunch_save_data($post_id) {
	global $meta_box;

	// verify nonce
	if (!wp_verify_nonce($_POST['journalcrunch_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

?>