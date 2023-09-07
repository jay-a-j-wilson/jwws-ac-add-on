<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
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
final class Map extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: ['ONE', 'TWO', 'THREE', 'FOUR', 'FIVE'],
            actual: Collection_Factory::create_and_get()
                ->map(
                    callback: fn (string $item): string => strtoupper(
                        string: $item,
                    ),
                )
                ->to_array(),
        );
    }
}
