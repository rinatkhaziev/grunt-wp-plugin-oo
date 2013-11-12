<?php
/**
 * Plugin Name: {%= title %}
 * Plugin URI:  {%= homepage %}
 * Description: {%= description %}
 * Version:     0.1.0
 * Author:      {%= author_name %}
 * Author URI:  {%= author_url %}
 * License:     GPLv2+
 * Text Domain: {%= prefix %}
 * Domain Path: /languages
 */

/**
 * Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %} (email : {%= author_email %})
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin-oo
 * Copyright (c) 2013 Rinat Khaziev
 *
 * grunt-wp-plugin-oo is based on
 * grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( '{%= prefix_caps %}_VERSION', '0.1.0' );
define( '{%= prefix_caps %}_URL',     plugin_dir_url( __FILE__ ) );
define( '{%= prefix_caps %}_PATH',    dirname( __FILE__ ) . '/' );

class {%= php_class_name %} {

	// Plugin properties

	function __construct() {
		// Hook the init
		add_action( 'init', array( $this, 'action_init' ) );
		register_activation_hook( __FILE__, array( $this, 'action_activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'action_deactivate' ) );
	}

	function action_init() {

		// i18nize
		$locale = apply_filters( 'plugin_locale', get_locale(), '{%= php_file_name %}' );
		load_textdomain( '{%= php_file_name %}', WP_LANG_DIR . '/{%= php_file_name %}/{%= php_file_name %}-' . $locale . '.mo' );
		load_plugin_textdomain( '{%= php_file_name %}', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Wire actions
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'action_admin_scripts' ) );
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, '' ) );
		add_action( 'wp_enqueue_scripts', array( $this, '' ) );
	}

	// Setup
	function action_activate() {
		flush_rewrite_rules();
	}

	// Cleanup
	function action_deactivate() {
		flush_rewrite_rules();
	}
}

global ${%= js_safe_name %};
${%= js_safe_name %} = new {%= php_class_name %};

