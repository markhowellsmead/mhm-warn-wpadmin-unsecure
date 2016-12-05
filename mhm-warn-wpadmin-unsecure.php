<?php
/*
Plugin Name: Warn of unsecure admin environment
Plugin URI: https://github.com/mhmli/mhm-warn-wpadmin-unsecure
Description: Outputs a warning message if the current view in the admin area was loaded over a non-secure connection. (i.e. without HTTPS/SSL.)
Author: Mark Howells-Mead
Version: 1.1.0
Author URI: https://markweb.ch/
Text Domain: mhm-warn-wpadmin-unsecure
Domain Path: /Resources/Private/Language
*/

if (version_compare($wp_version, '4.6', '<') || version_compare(PHP_VERSION, '5.3', '<')) {
    function mhm_warn_wpadmin_unsecure_compatability_warning()
    {
        echo '<div class="error"><p>'.sprintf(
            __('“%1$s” requires PHP %2$s (or newer) and WordPress %3$s (or newer) to function properly. Your site is using PHP %4$s and WordPress %5$s. Please upgrade. The plugin has been automatically deactivated.', 'TEXT-DOMAIN'),
            'PLUGIN NAME',
            '5.3',
            '4.6',
            PHP_VERSION,
            $GLOBALS['wp_version']
        ).'</p></div>';
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
    add_action('admin_notices', 'mhm_warn_wpadmin_unsecure_compatability_warning');

    function mhm_warn_wpadmin_unsecure_deactivate_self()
    {
        deactivate_plugins(plugin_basename(__FILE__));
    }
    add_action('admin_init', 'mhm_warn_wpadmin_unsecure_deactivate_self');

    return;
} else {
    include 'Classes/Plugin.php';
}
