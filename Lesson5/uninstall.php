<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  notes
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data
$notes = get_posts( array( 'post_type' => 'notes', 'numberposts' => -1 ) );

foreach( $notes as $note ) {
	wp_delete_post( $note->ID, true );
}

// Access the database via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );