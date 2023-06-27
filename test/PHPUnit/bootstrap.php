<?php declare(strict_types=1);

namespace JWWS\ACA\Test\PHPUnit;

use JWWS\ACA\Test\PHPUnit\WordPress\Configuration\Configuration;

require __DIR__ . '/../../vendor/autoload.php';

$GLOBALS['wp_tests_options'] = [
    'active_plugins' => []
];

Configuration::of(
    file: __DIR__ . '/WordPress/includes/bootstrap.php',
    options: [
        'active_plugins' => [
            'admin-columns-pro/admin-columns-pro.php',
        ],
    ],
)
    ->init()
;
