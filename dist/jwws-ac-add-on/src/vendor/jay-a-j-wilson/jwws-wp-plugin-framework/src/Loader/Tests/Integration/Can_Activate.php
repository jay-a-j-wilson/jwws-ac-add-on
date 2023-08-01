<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Loader;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Loader
 *
 * @internal
 *
 * @small
 */
final class Can_Activate extends TestCase {
    protected static Plugin $basic;

    protected static Plugin $akismet;

    protected static Loader $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet = Akismet_Plugin_Factory::create_and_get();

        self::$basic = Basic_Plugin_Factory::create_and_get();

        self::$sut = Loader::of(
            plugin: self::$basic->add_dependencies(plugins: self::$akismet),
        );
    }

    public static function tearDownAfterClass(): void {
        parent::tearDownAfterClass();
    }

    /**
     * @test
     */
    public function pass(): Loader {
        self::assertFalse(condition: self::$sut->can_activate());

        return self::$sut;
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_activate(Loader $sut): void {
        activate_plugin(plugin: self::$akismet->basename());

        self::assertTrue(condition: $sut->can_activate());
    }
}
