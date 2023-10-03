<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Deactivated_Plugin\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
 *
 * @internal
 *
 * @small
 */
final class Callback extends TestCase {
    private const PLUGIN_BASENAME = 'dir/plugin.php';

    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(bool $arg_1, InvokedCount $arg_2): void {
        $dependency = self::createMock(originalClassName: Plugin::class);

        $dependency
            ->expects(self::once())
            ->method(constraint: 'contains_dependency')
            ->with(arguments: self::equalTo(value: self::PLUGIN_BASENAME))
            ->willReturn(value: $arg_1)
        ;

        $dependency
            ->expects($arg_2)
            ->method(constraint: 'deactivate')
        ;

        Deactivated_Plugin::of(plugin: $dependency)
            ->callback(plugin: self::PLUGIN_BASENAME)
        ;
    }

    public static function pass_data_provider(): iterable {
        yield 'true' => [
            true,
            self::once(),
        ];

        yield 'false' => [
            false,
            self::never(),
        ];
    }
}
