<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Filter_By_Value extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: ['three', 'four', 'five'],
            actual: Collection_Factory::create_and_get()
                ->filter_by_value(
                    fn (string $item): bool => strlen(string: $item) > 3,
                )
                ->to_array(),
        );
    }
}
