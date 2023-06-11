<?php
/**
 * Plugin Name:  Admin Columns - Add On
 * Description:  Extra Columns.
 * Version:      3.0.0b1
 * Requires PHP: 8.0
 * Author:       Jay Wilson
 * License:      GPLv2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace JWWS\ACA;

use JWWS\ACA\Common\Collection\Collection_Test;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
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

// Collection_Test::run();

App::hook();