<?php declare(strict_types=1);

namespace JWWS\ACA;

use JWWS\ACA\App\Factory\Factory as App_Factory;

use function define;

/**
 * Plugin Name:  Admin Columns - Add On
 * Description:  Adds new columns.
 * Version:      4.5.2
 * Requires PHP: 8.1
 * Author:       Jay Wilson
 * License:      GPLv2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html.
 */
if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once __DIR__ . '/src/vendor/autoload.php';

require_once __DIR__ . '/vendor/autoload.php';

define(__NAMESPACE__ . '\DOMAIN', 'jwws');
define(__NAMESPACE__ . '\VENDOR_PREFIX', 'jwws__');

define(
    constant_name: __NAMESPACE__ . '\PLUGIN_DIR',
    value: basename(
        path: plugin_dir_path(
            file: __FILE__,
        ),
    ),
);

define(
    constant_name: __NAMESPACE__ . '\ASSETS_URL',
    value: plugin_dir_url(file: __FILE__) . '/src/assets',
);
define(
    constant_name: __NAMESPACE__ . '\ASSETS_PATH',
    value: plugin_dir_path(file: __FILE__) . 'src/assets',
);

App_Factory::new_instance()
    ->create()
    ->hook()
;
