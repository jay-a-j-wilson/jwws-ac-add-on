<?php declare(strict_types=1);

namespace JWWS\ACA\Test\PHPUnit;

use JWWS\ACA\Test\PHPUnit\WordPress\Configuration\Configuration;

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../src/vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once getenv('WP_PHPUNIT__DIR') . '/includes/functions.php';

/**
 * Manually load the plugin dependencies being tested.
 *
 * @source https://stackoverflow.com/questions/50722315/integration-testing-of-a-wordpress-plugin-that-needs-composer-and-npm-to-be-exec
 *
 * TODO: update_option method seems to only work when use in this file.
 */
tests_add_filter('muplugins_loaded', function (): void {
    $plugins = [
        'woocommerce/woocommerce.php',
        'admin-columns-pro/admin-columns-pro.php',
        'yith-cost-of-goods-for-woocommerce-premium/init.php'
        // 'jwws-elementor-pro-add-on/jwws-elementor-pro-add-on.php',
    ];

    update_option(option: 'active_plugins', value: $plugins);

    // Tester WordPress installation plugin directory
    $plugin_dir = '/Users/jaywilson/Sites/WordPress/local.wordpress.test/wp-content/plugins/';

    foreach ($plugins as $plugin) {
        require_once $plugin_dir . $plugin;
    }
});

$GLOBALS['wp_tests_options'] = [
    'active_plugins' => [],
];

Configuration::of(
    file: getenv('WP_PHPUNIT__DIR') . '/includes/bootstrap.php',
    options: [
        'active_plugins' => [],
    ],
)
    ->init()
;
