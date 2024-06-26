<?php

/**
 * Registration logic for the new ACF field type.
 */

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', 'acf_inline_editor_field_include_acf_field_acf_inline_editor_field');
/**
 * Registers the ACF field type.
 */
function acf_inline_editor_field_include_acf_field_acf_inline_editor_field()
{
	if (!function_exists('acf_register_field_type')) {
		return;
	}

	require_once __DIR__ . '/class-acf-inline-editor-field.php';

	acf_register_field_type('acf_inline_editor_field');
}

// Load textdomain
add_action('plugins_loaded', 'acf_ief_load_translations');
function acf_ief_load_translations()
{
	load_plugin_textdomain('acf-inline-editor-field', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
