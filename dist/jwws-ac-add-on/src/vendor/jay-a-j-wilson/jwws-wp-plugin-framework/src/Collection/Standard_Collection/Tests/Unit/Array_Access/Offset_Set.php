<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Array_Access;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Offset_Set extends TestCase {
    private Collection $sut;

    protected function setUp(): void {
        parent::setUp();

        $this->sut = Collection_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_end(): void {
        $this->sut[] = 'six';

        self::assertSame(
            expected: ['one', 'two', 'three', 'four', 'five', 'six'],
            actual: $this->sut->to_array(),
        );
    }

    /**
     * @test
     */
    public function pass_n(): void {
        $this->sut[2] = 'UPDATED';

        self::assertSame(
            expected: ['one', 'two', 'UPDATED', 'four', 'five'],
            actual: $this->sut->to_array(),
        );
    }
}
