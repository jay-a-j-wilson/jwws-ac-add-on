<?php declare(strict_types=1);

namespace JWWS\ACA\Test\PHPUnit;

use JWWS\ACA\Test\PHPUnit\WordPress\Configuration\Configuration;

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once __DIR__ . '/../../vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

$GLOBALS['wp_tests_options'] = [
    'active_plugins' => []
];

Configuration::of(
    file: getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php',
    options: [
        'active_plugins' => [
            'admin-columns-pro/admin-columns-pro.php',
        ],
    ],
)
    ->init()
;
