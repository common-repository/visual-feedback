<?php
/*
 * @package VisualFeedback
 *
 * Plugin Name: Visual Feedback
 * Description: Collect feedback from your client on your WordPress site and its accompanying graphics. Make feedback simpler for your client & more powerful for you.
 * Plugin URI: https://www.timeline.io
 * Version: 1.3.1
 * Author: OrbitalOne
 * Author URI: https://www.orbitalone.com
 * Text Domain: visual-feedback
 * License: GPL v3
 *
 */
 
 /*
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2019 OrbitalOne, LLC
 */
 
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! defined( 'WP_VISUAL_FEEDBACK_FILE' ) ) {
	define( 'WP_VISUAL_FEEDBACK_FILE', __FILE__ );
}

// Load the Yoast SEO plugin.
require_once dirname( WP_VISUAL_FEEDBACK_FILE ) . '/visual-feedback-main.php';