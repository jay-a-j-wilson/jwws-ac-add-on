<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Countable;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Count extends TestCase {
    /**
     * @test
     *
     * ? Possibly integration test.
     */
    public function pass(): void {
        $sut = Collection_Factory::create_and_get();

        self::assertSame(expected: 5, actual: $sut->count());
        $sut->add(items: 'six');
        self::assertSame(expected: 6, actual: $sut->count());
    }
}
