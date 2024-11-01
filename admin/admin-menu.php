<?php // Visual Feedback - Plugin menu in admin area

// Do not let users call this file directly
if (!defined('ABSPATH')) {
	exit;
}

// Add top-level admin menu link
function visual_feedback_by_timeline__add_toplevel_menu() {
	
	add_menu_page(
		'Visual Feedback - Settings',																// Title of page to which menu link leads
		'Visual Feedback',																					// Title of link in menu
		'manage_options',																						// Capability required by users (don't show this link to users without this capability)
		'visual-feedback-settings-page',														// URL slug of page
		'visual_feedback_by_timeline__show_settings_sections',			// Function which is called upon click of this menu link
		'dashicons-admin-generic',																	// Icon URL
		null																												// Position # of menu link
	);
	
}
add_action( 'admin_menu', 'visual_feedback_by_timeline__add_toplevel_menu' );