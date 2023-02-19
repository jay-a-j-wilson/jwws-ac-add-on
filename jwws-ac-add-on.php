<?php
/*
Plugin Name: Admin Columns - Add On
Description: Extra Columns.
Version:     1.2.1
Author:      Jay Wilson
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

namespace JWWS\Admin_Columns_Add_On;

if (! defined('ABSPATH')) {
    return;
}

require __DIR__ . '/vendor/autoload.php';

if (is_admin()) {
    if (! function_exists(function: 'get_plugin_data')) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    define(__NAMESPACE__ . '\PLUGIN_DATA', get_plugin_data(plugin_file: __FILE__));
    define(__NAMESPACE__ . '\PLUGIN_NAME', PLUGIN_DATA['Name']);
}

define(__NAMESPACE__ . '\PLUGIN_DIR', basename(path: plugin_dir_path(file: __FILE__)));
define(__NAMESPACE__ . '\PLUGIN_DIR_URL', plugin_dir_url(file: __FILE__));

define(__NAMESPACE__ . '\DOMAIN', 'jwws');
define(__NAMESPACE__ . '\VENDOR_PREFIX', 'jwws__');

// App::hook();
Modules\Root::hook();