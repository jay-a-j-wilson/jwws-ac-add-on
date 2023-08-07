<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use WP_UnitTestCase;

/**
 * @internal
 */
abstract class Fixture extends WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    /**
     * Creates plugin for testing.
     */
    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin_Factory::create_and_get();
        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();

        // self::print(self::$plugin);
    }

    /**
     * Deletes plugin for consistent test results.
     */
    final public static function tearDownAfterClass(): void {
        parent::tearDownAfterClass();
    }
}
