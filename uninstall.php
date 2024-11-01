<?php 
/*
 * Fires when plugin is uninstalled by user via Plugins page
 */



// Ensure user has proper permissions and file is loaded in WP
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	
	exit;
	
}

// Remove fields unique to this plugin from DB
delete_option( 'visual_feedback_by_timeline__user_options' );