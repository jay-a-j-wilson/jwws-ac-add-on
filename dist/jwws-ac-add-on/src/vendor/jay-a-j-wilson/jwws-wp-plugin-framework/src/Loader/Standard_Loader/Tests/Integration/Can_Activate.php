<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Standard_Loader;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
use PHPUnit\Framework\TestCase;
use function activate_plugin;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Standard_Loader
 *
 * @internal
 *
 * @small
 */
final class Can_Activate extends TestCase {
    protected static Plugin $basic;

    protected static Plugin $akismet;

    protected static Standard_Loader $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet = Akismet_Plugin_Factory::create_and_get();

        self::$basic = Basic_Plugin_Factory::create_and_get();

        self::$sut = Standard_Loader::of(
            plugin: self::$basic->add_dependencies(plugins: self::$akismet),
        );
    }

    public static function tearDownAfterClass(): void {
        parent::tearDownAfterClass();
    }

    /**
     * @test
     */
    public function pass(): Standard_Loader {
        self::assertFalse(condition: self::$sut->can_activate());

        return self::$sut;
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_activate(Standard_Loader $sut): void {
        activate_plugin(plugin: self::$akismet->basename());

        self::assertTrue(condition: $sut->can_activate());
    }
}
