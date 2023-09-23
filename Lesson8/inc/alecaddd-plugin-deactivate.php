<?php
/**
 * @package  notes
 */

class notesDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}