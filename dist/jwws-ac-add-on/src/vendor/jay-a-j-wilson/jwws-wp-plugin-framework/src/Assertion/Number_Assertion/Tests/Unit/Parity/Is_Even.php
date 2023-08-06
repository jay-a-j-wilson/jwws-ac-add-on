<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Parity;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Even extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Parity\Data_Provider::even_numbers
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(int|float $arg): void {
        $this->expectNotToPerformAssertions();
        Number_Assertion::of(number: $arg)->is_even();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Parity\Data_Provider::odd_numbers
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(int|float $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Number_Assertion::of(number: $arg)->is_even();
    }
}
