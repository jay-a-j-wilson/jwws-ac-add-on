<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Slice extends TestCase {
    /**
     * @test
     *
     * @dataProvider slice_data_provider
     *
     * @testdox pass[$_dataName] => $arg equals $expected
     */
    public function slice(int $arg, array $expected): void {
        self::assertSame(
            expected: $expected,
            actual: Collection_Factory::create_and_get()
                ->slice(offset: $arg)
                ->to_array(),
        );
    }

    public static function slice_data_provider(): iterable {
        yield 'extract all but last' => [-1, ['five']];

        yield 'extract first' => [1, ['two', 'three', 'four', 'five']];
    }
}
