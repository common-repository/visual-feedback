<?php

// Place init script with dynamic event ID into footer
function add_vf_script_to_footer( $name ) {
	
	// Get all custom data unique to this plugin
	$vf_options_full = get_option('visual_feedback_by_timeline__user_options');
	// Retrieve three values, event ID to link feedback to, event share link (which gives us access to the event), and flag which tells us whether user has enabled or disabled feedback at the top-level
	$vf_event_id = isset( $vf_options_full['vf_user_specified_event_id'] ) ? sanitize_text_field( $vf_options_full['vf_user_specified_event_id'] ) : false;
	$vf_event_share_link = isset( $vf_options_full['vf_user_specified_event_share_link'] ) ? sanitize_text_field( $vf_options_full['vf_user_specified_event_share_link'] ) : false;
	$vf_enabled = isset( $vf_options_full['vf_is_feedback_enabled'] ) ? ((int)$vf_options_full['vf_is_feedback_enabled']) : false;
	
	// If visual feedback is currently enabled
	if($vf_enabled) {
		// If user has already authenticated and linked an event
		if(!empty($vf_event_id) && $vf_event_id != false && is_numeric($vf_event_id) && 
			 !empty($vf_event_share_link) && $vf_event_share_link != false && $vf_event_share_link != "") {		
			
			// Enqueue necessary stylesheet and scripts for Visual Feedback
			wp_enqueue_style( 'visual-feedback-s', plugins_url( '/public/css/s.min.css', __FILE__ ));
			wp_enqueue_script('visual-feedback-v', plugins_url( '/public/js/v.min.js', __FILE__ ), array('jquery'));
    	wp_enqueue_script('visual-feedback-c', plugins_url( '/public/js/c-3.0.4.min.js', __FILE__ ), array('jquery'));
    	wp_add_inline_script('visual-feedback-c', '(function() {window.teidvf = ' . $vf_event_id . '; window.tio_vf_eat = "' . $vf_event_share_link . '";})();', 'before' );

		}
	}
}
add_action( 'get_footer', 'add_vf_script_to_footer' );


// If in wp-admin area
if (is_admin()) {
	
	// Include dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	
}


// Default plugin settings
function visual_feedback_options_default() {

	return array(
		'vf_user_specified_event_id'     => '',
		'vf_is_feedback_enabled'   => 0,
	);

}
