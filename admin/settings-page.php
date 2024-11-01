<?php // Visual Feedback - Settings page for admin users

// Do not let users call this file directly
if (!defined('ABSPATH')) {
	exit;
}


// Add custom JS and CSS to settings page for this plugin
function visual_feedback_by_timeline__add_js_to_plugin_settings_page($hook_suffix) {

	// If we are on settings page for this plugin
	if($hook_suffix == 'toplevel_page_visual-feedback-settings-page') {
		// Enqueue the script
    wp_enqueue_script('visual-feedback-plugin-settings', plugin_dir_url( __FILE__ ) . 'js/visual-feedback-plugin-settings.min.js', array('jquery'));
    // Enqueue the stylesheet
    wp_enqueue_style( 'visual-feedback-plugin-settings', plugin_dir_url( __FILE__ ) . 'css/visual-feedback-plugin-settings.min.css');
	}
   
}
add_action('admin_enqueue_scripts', 'visual_feedback_by_timeline__add_js_to_plugin_settings_page');


function visual_feedback_by_timeline__show_settings_sections() {

	if ( !current_user_can('manage_options') ) return;

	?>
	
	<div class="wrap">

		<?php

			// If the user configured or reconfigured the plugin i.e. options were updated, display a message saying so
			if ( isset( $_GET['settings-updated'] ) ) {
		    echo '<div class="notice notice-success is-dismissible"><p>Your Visual Feedback configuration was successfully updated.</p></div>';
			}
			
		?>

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<form id="visual_feedback_by_timeline__plugin_settings_form" action="options.php" method="post">

			<?php
			
			// Output nonce, action, and option_page fields for this plugin's settings page
			settings_fields( 'visual_feedback_by_timeline__user_options' );
			
			// Output settings sections (part 1) for this plugin's settings page
			do_settings_sections( 'visual-feedback-settings-page-pt-1' );
			
			// Print a submit button
			submit_button('Save Changes', 'primary', 'submit');
			
			// Output settings sections (part 1) for this plugin's settings page
			do_settings_sections( 'visual-feedback-settings-page-pt-2' );

			$options = get_option( 'visual_feedback_by_timeline__user_options', visual_feedback_options_default() );
			if($options['vf_user_specified_event_id'] != "" && $options['vf_user_specified_event_id'] != -1) {
				echo '<a class="button button-primary" style=" margin-top: 6px; margin-bottom: 19.5px;" href="https://app.timeline.io/redirect-to-event/' . $options['vf_user_specified_event_id'] . '" target="_blank">View Feedback <i class="fa fa-external-link" aria-hidden="true"></i></a>';
			}

			?>
	
		</form>

		<h2><i class="fa fa-cogs" aria-hidden="true"></i> Configure Visual Feedback</h2>
		<p>Change which Project and/or Event feedback from this website is linked to. </br>This will require you to log in to Timeline.io and select a new Project and/or Event to link to this website.</p>

		<?php $currentPageURL = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
		<a class="button button-primary" href="https://app.timeline.io/auth/wordpress?redirect_after_auth=<?php echo urlencode($currentPageURL); ?>">Configure Plugin <i class="fa fa-external-link" aria-hidden="true"></i></a>
			
	</div>

<?php

}

