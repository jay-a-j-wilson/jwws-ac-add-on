<?php declare(strict_types=1);

namespace JWWS\ACA\Tests\PHPUnit;

use JWWS\ACA\Tests\PHPUnit\WordPress\Configuration\Configuration;

require __DIR__ . '/../../vendor/autoload.php';

Configuration::of(
    file: __DIR__ . '/WordPress/includes/bootstrap.php',
    // options: [
    //     'active_plugins' => [
    //         'akismet/akismet.php',
    //     ],
    // ],
)
    ->init()
;
