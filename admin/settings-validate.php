<?php // Visual Feedback - Function to validate new user-defined (or timeline.io application-defined) entries for custom options for this plugin

// Do not let users call this file directly
if (!defined('ABSPATH')) {
	exit;
}

// callback: validate options
function visual_feedback_by_timeline__validate_options( $input ) {

	// Feedback Enabled boolean
	if (!isset($input['vf_is_feedback_enabled'])) {
		// Default to false
		$input['vf_is_feedback_enabled'] = false;
	} 

	// Event ID string
	if (isset($input['vf_user_specified_event_id'])) {
		$input['vf_user_specified_event_id'] = sanitize_text_field($input['vf_user_specified_event_id']);
	} 

	// Event Share Link string
	if (isset($input['vf_user_specified_event_share_link'])) {
		$input['vf_user_specified_event_share_link'] = sanitize_text_field($input['vf_user_specified_event_share_link']);
	} 

	// Event Title string
	if (isset($input['vf_user_specified_event_title'])) {
		$input['vf_user_specified_event_title'] = sanitize_text_field($input['vf_user_specified_event_title']);
	}

	// Project ID string
	if (isset($input['vf_user_specified_project_id'])) {
		$input['vf_user_specified_project_id'] = sanitize_text_field($input['vf_user_specified_project_id']);
	}

	// Project Title string
	if (isset($input['vf_user_specified_project_title'])) {
		$input['vf_user_specified_project_title'] = sanitize_text_field($input['vf_user_specified_project_title']);
	}

	return $input;

}