<?php
/**
 * @package  notes
 */

class notesActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}