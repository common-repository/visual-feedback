<?php // Visual Feedback - Callbacks which contain input fields for plugin settings
	
// Do not let users call this file directly
if (!defined('ABSPATH')) {
	exit;
}

// callback: content for '' section
function visual_feedback_by_timeline__checkbox__print_info() {
	echo 'Should feedback be enabled on this website?';
}

// callback: content for '' section
function visual_feedback_by_timeline__fields__print_info() {
	echo 'Feedback from this website (if enabled above) is being sent to the following Project and Event in your Timeline.io account.';
}

// callback: text field for event title or project title
function visual_feedback_by_timeline__show_text_field( $args ) {
	
	$options = get_option( 'visual_feedback_by_timeline__user_options', visual_feedback_options_default() );
	
	//print_r($options);
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<div class="visual_feedback_by_timeline__field_value">' . $value . '</div>';
	echo '<input id="visual_feedback_by_timeline__user_options_'. $id .'" name="visual_feedback_by_timeline__user_options['. $id .']" type="hidden" value="'. $value .'"><br />';
	//echo '<label for="visual_feedback_by_timeline__user_options_'. $id .'">'. $label .'</label>';
		
}

// callback: text field for event ID or project ID
function visual_feedback_by_timeline__show_hidden_field( $args ) {
	
	$options = get_option( 'visual_feedback_by_timeline__user_options', visual_feedback_options_default() );
	
	//print_r($options);
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="visual_feedback_by_timeline__user_options_'. $id .'" name="visual_feedback_by_timeline__user_options['. $id .']" type="hidden" value="'. $value .'"><br />';
	//echo '<label for="visual_feedback_by_timeline__user_options_'. $id .'">'. $label .'</label>';
		
}

// callback: checkbox field for 'feedback enabled?' boolean
function visual_feedback_by_timeline__show_checkbox_field( $args ) {

	$options = get_option( 'visual_feedback_by_timeline__user_options', visual_feedback_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';

	echo '<input id="visual_feedback_by_timeline__user_options_'. $id .'" name="visual_feedback_by_timeline__user_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label class="check-box" for="visual_feedback_by_timeline__user_options_'. $id .'">'. $label .'</label>';

	// If feedback is disabled, display a message to make it clear to the user
	if(isset( $options[$id] ) && $options[$id] == 0) {
		echo '<span id="visual_feedback_by_timeline__feedback_disabled_message">Feedback is currently disabled.</span>';
	} elseif(isset( $options[$id] ) && $options[$id] == 1) {
		echo '<span id="visual_feedback_by_timeline__feedback_enabled_message">Feedback is currently enabled.</span>';
	}

}

/*

// callback : select field, for FUTURE DIRECT SELECTION OF PROJECT/EVENT WITHIN WP PLUGIN VIA AJAX
function myplugin_callback_field_select( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = array(
		
		'default'   => 'Default',
		'light'     => 'Light',
		'blue'      => 'Blue',
		'coffee'    => 'Coffee',
		'ectoplasm' => 'Ectoplasm',
		'midnight'  => 'Midnight',
		'ocean'     => 'Ocean',
		'sunrise'   => 'Sunrise',
		
	);
	
	echo '<select id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="myplugin_options_'. $id .'">'. $label .'</label>';
	
}

*/