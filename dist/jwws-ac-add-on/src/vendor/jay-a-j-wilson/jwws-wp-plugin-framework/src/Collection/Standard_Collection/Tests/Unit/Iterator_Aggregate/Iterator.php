<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Iterator_Aggregate;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Iterator extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $sut = Collection_Factory::create_and_get();

        $i = 0;

        foreach ($sut as $key => $value) {
            self::assertSame(
                expected: $sut[$key],
                actual: $value,
            );

            $i++;
        }

        self::assertSame(expected: 5, actual: $i);
    }
}
