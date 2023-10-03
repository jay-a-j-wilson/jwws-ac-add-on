<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Less_Or_Equal extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison\Data_Provider::is_less
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison\Data_Provider::is_equal
     *
     * @testdox pass[$_dataName] => $arg_2 less than $arg_1
     */
    public function pass(int|float $arg_1, int|float $arg_2): void {
        $this->expectNotToPerformAssertions();
        Number_Assertion::of(number: $arg_1)->is_less_or_equal(max: $arg_2);
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison\Data_Provider::is_greater
     *
     * @testdox throw[$_dataName] => $arg_2 not less than $arg_1
     */
    public function throw(int|float $arg_1, int|float $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Number_Assertion::of(number: $arg_1)->is_less_or_equal(max: $arg_2);
    }
}
