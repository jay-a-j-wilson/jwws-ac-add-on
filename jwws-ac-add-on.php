<?php declare(strict_types=1);

namespace JWWS\ACA;

use JWWS\ACA\App\Factory\Factory as App_Factory;

/**
 * Plugin Name:  Admin Columns - Add On
 * Description:  Adds new columns.
 * Version:      3.2.3
 * Requires PHP: 8.1
 * Author:       Jay Wilson
 * License:      GPLv2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html.
 */

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require __DIR__ . '/vendor/autoload.php';

\define(
    constant_name: __NAMESPACE__ . '\PLUGIN_DIR',
    value: basename(
        path: plugin_dir_path(
            file: __FILE__,
        ),
    ),
);

\define(__NAMESPACE__ . '\DOMAIN', 'jwws');
\define(__NAMESPACE__ . '\VENDOR_PREFIX', 'jwws__');

App_Factory::new_instance()
    ->create()
    ->hook()
;
