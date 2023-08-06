<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Not_Empty extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty\Data_Provider::not_empty
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(array $arg): void {
        $this->expectNotToPerformAssertions();
        Array_Assertion::of(array: $arg)->is_not_empty();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty\Data_Provider::empty
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(array $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Array_Assertion::of(array: $arg)->is_not_empty();
    }
}
