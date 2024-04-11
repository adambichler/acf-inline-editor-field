<?php
/*
Plugin Name:  ACF Inline Editor Field
Plugin URI:   https://github.com/adambichler/acf-inline-editor-field
Description:  ACF Inline Editor Field is a custom field for Advanced Custom Fields which allows you to edit field values directly in the field, without a toolbar.
Version:      1.0.0
Author:       Adam Bichler
Author URI:   https://www.adambichler.at
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  acf-inline-editor-field
Domain Path:  /languages
*/


//include the init file
include_once __DIR__ . '/init.php';

//wait for the admin_init action to make sure ACF is loaded
add_action('admin_init', 'load_acf_inline_editor_field');
function load_acf_inline_editor_field()
{
    //load the wp plugins file
    require_once ABSPATH . 'wp-admin/includes/plugin.php';


    //check if ACF is installed
    if (!class_exists('ACF')) {
        add_action('admin_notices', 'acf_inline_editor_field_admin_notice');
        function acf_inline_editor_field_admin_notice()
        {
?>
<div class="notice notice-error is-dismissible">
    <p><?php _e('ACF Inline Editor Field requires Advanced Custom Fields to be installed and activated. Without ACF active, the plugin cannot be activated.', 'acf-inline-editor-field'); ?>
    </p>
</div>
<?php
        }
        //deactivate the plugin
        deactivate_plugins(plugin_basename(__FILE__));
        return;
    }
}