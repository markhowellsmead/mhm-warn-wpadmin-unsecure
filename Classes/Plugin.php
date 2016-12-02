<?php

namespace MHM\MhmWarnWpadminUnsecure;

class Plugin
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'loadTextDomain'));
        if (!isset($_SERVER['HTTPS']) || empty($_SERVER['HTTPS']) || strtolower($_SERVER['HTTPS']) === 'off') {
            add_action('admin_notices', array($this, 'render'));
        }
    }

    /**
     * Load translation files from the indicated directory.
     */
    public function loadTextDomain()
    {
        load_plugin_textdomain('mhm-warn-wpadmin-unsecure', false, dirname(plugin_basename(__FILE__)).'/Resources/Private/Language');
    }

    /**
     * Render the warning message.
     */
    public function render()
    {
        printf(
            '<div class="%1$s"><p>%2$s</p></div>',
            'notice notice-warning is-dismissible',
            __('The current page was not loaded over a secure connection. Be careful when adding any sensitive data to the page, or when saving sensitive information through the current interface.', 'mhm-warn-wpadmin-unsecure')
        );
    }
}

new Plugin();
