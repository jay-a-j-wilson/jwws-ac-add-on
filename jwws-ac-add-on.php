<?php
/**
 * Plugin Name:  Admin Columns - Add On
 * Description:  Extra Columns.
 * Version:      2.0.0
 * Requires PHP: 8.0
 * Author:       Jay Wilson
 * License:      GPLv2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace JWWS\ACA;

if (! defined('ABSPATH')) {
    return;
}

require __DIR__ . '/vendor/autoload.php';

define(
    constant_name: __NAMESPACE__ . '\PLUGIN_DIR',
    value: basename(
        path: plugin_dir_path(
            file: __FILE__,
        ),
    ),
);

define(__NAMESPACE__ . '\DOMAIN', 'jwws');
define(__NAMESPACE__ . '\VENDOR_PREFIX', 'jwws__');

App::hook();