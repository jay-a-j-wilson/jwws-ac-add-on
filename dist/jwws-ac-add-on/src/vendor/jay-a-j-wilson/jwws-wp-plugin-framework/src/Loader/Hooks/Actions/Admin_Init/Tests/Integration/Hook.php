<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 *
 * @small
 */
final class Hook extends \WP_UnitTestCase {
    private const HOOK = 'admin_init';

    private const METHOD = 'callback';

    private static Admin_Init $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$sut = Admin_Init::of(
            plugin: Basic_Plugin_Factory::create_and_get(),
        );
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertFalse(
            condition: has_action(
                self::HOOK,
                [
                    self::$sut,
                    self::METHOD,
                ],
            ),
        );
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_action(): void {
        self::$sut->hook();

        self::assertSame(
            expected: 10,
            actual: has_action(
                self::HOOK,
                [
                    self::$sut,
                    self::METHOD,
                ],
            ),
        );
    }
}
