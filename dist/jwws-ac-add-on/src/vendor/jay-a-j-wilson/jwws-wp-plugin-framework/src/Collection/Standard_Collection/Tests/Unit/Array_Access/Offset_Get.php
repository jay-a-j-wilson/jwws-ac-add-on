<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Array_Access;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Offset_Get extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $sut = Collection_Factory::create_and_get();

        foreach ($sut as $key => $value) {
            self::assertSame(
                expected: $value,
                actual: $sut[$key],
            );
        }
    }
}
