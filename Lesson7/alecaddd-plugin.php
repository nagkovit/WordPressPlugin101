<?php
/**
 * @package  notes
 */
/*
Plugin Name: Notes
Plugin URI: https://www.google.com/search?q=Notes&rlz=1C1YTUH_enIN1015IN1015&oq=Notes&aqs=chrome..69i57j69i60.4690j0j15&sourceid=chrome&ie=UTF-8
Description: You can write notes in your Wordpress Website Backend using this Plugin.
Version: 1.0.0
Author: Kovit Nag
Author URI: https://notespluginwordpressdeveloper.gr-site.com/
License: GPLv2 or later
Text Domain: Notes
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

class notes
{
	// Public
	// can be accessed everywhere

	// Protected
	// can be accessed only within the class itself or extensions of that class

	// Private
	// can be accessed only within the class itself

	// Static

	function __construct() {
		// $this->print_stuff();
	}

	function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	protected function create_post_type() {
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}

	function activate() {
		// generated a CPT
		$this->custom_post_type();
		// flush rewrite rules
		flush_rewrite_rules();
	}

	function deactivate() {
		// flush rewrite rules
		flush_rewrite_rules();
	}

	function custom_post_type() {
		register_post_type( 'note', ['public' => true, 'label' => 'Notes'] );
	}

	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
		wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
	}

	private function print_stuff() {
		echo 'Test';
	}
}

class notepad extends notes
{
	function register_post_type() {
		$this->create_post_type();
	}
}

if ( class_exists( 'notes' ) ) {
	$notes = new notes();
	$notes->register();
}

$notepad = new notepad();
$notepad->register_post_type();

// activation
register_activation_hook( __FILE__, array( $notes, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $notes, 'deactivate' ) );
