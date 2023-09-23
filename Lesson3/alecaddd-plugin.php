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
	function activate() {
		// generated a CPT
		// flush rewrite rules
	}

	function deactivate() {
		// flush rewrite rules
	}

	function uninstall() {
		// delete CPT
		// delete all the plugin data from the DB
	}
}

if ( class_exists( 'notes' ) ) {
      $notes = new notes();
}

// activation
register_activation_hook( __FILE__, array( $alecadddPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $alecadddPlugin, 'deactivate' ) );

// uninstall