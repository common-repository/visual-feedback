<?php // Visual Feedback - Register settings unique to this plugin

// Do not let users call this file directly
if (!defined('ABSPATH')) {
	exit;
}

// register plugin settings
function visual_feedback_by_timeline__register_plugin_settings() {
	
	// Create new settings group	
	/*
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
	);
	*/
	register_setting( 
		'visual_feedback_by_timeline__user_options', 	// Settings group name
		'visual_feedback_by_timeline__user_options', 	// Name of an option to sanitize and save
		'visual_feedback_by_timeline__validate_options' // Callback function to sanitize the option's value
	); 
	
	// Create new settings section
	/*
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	*/
	add_settings_section( 
		'visual_feedback_by_timeline__section__checkbox',
		'General', 
		'visual_feedback_by_timeline__checkbox__print_info', // Callback to print text at top of section
		'visual-feedback-settings-page-pt-1'
	);
	add_settings_section( 
		'visual_feedback_by_timeline__section__fields',
		'<i class="fa fa-info-circle" aria-hidden="true"></i> Timeline.io Connection Details', 
		'visual_feedback_by_timeline__fields__print_info', // Callback to print text at top of section
		'visual-feedback-settings-page-pt-2'
	);
	
	// Add fields to settings section(s)
	/*
	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);
	*/
	add_settings_field(
		'vf_is_feedback_enabled',
		'Feedback Enabled?',
		'visual_feedback_by_timeline__show_checkbox_field',
		'visual-feedback-settings-page-pt-1',
		'visual_feedback_by_timeline__section__checkbox',
		[ 'id' => 'vf_is_feedback_enabled', 'label' => '' ]
	);
	add_settings_field(
		'vf_user_specified_project_title',
		'Project:',
		'visual_feedback_by_timeline__show_text_field',
		'visual-feedback-settings-page-pt-2',
		'visual_feedback_by_timeline__section__fields',
		[ 'id' => 'vf_user_specified_project_title', 'label' => '' ]
	);
	add_settings_field(
		'vf_user_specified_event_title',
		'Event:',
		'visual_feedback_by_timeline__show_text_field',
		'visual-feedback-settings-page-pt-2',
		'visual_feedback_by_timeline__section__fields',
		[ 'id' => 'vf_user_specified_event_title', 'label' => '' ]
	);
	add_settings_field(
		'vf_user_specified_event_id',
		'',
		'visual_feedback_by_timeline__show_hidden_field',
		'visual-feedback-settings-page-pt-2',
		'visual_feedback_by_timeline__section__fields',
		[ 'id' => 'vf_user_specified_event_id', 'label' => '' ]
	);
	add_settings_field(
		'vf_user_specified_event_share_link',
		'',
		'visual_feedback_by_timeline__show_hidden_field',
		'visual-feedback-settings-page-pt-2',
		'visual_feedback_by_timeline__section__fields',
		[ 'id' => 'vf_user_specified_event_share_link', 'label' => '' ]
	);
	add_settings_field(
		'vf_user_specified_project_id',
		'',
		'visual_feedback_by_timeline__show_hidden_field',
		'visual-feedback-settings-page-pt-2',
		'visual_feedback_by_timeline__section__fields',
		[ 'id' => 'vf_user_specified_project_id', 'label' => '' ]
	);
	

}
add_action( 'admin_init', 'visual_feedback_by_timeline__register_plugin_settings' );
