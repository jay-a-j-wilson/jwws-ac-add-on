<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\False;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Not_False extends TestCase {
    /**
     * @test
     *
     * @dataProvider JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::truthy
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Boolean_Assertion::of(boolean: $arg)->is_not_false();
    }

    /**
     * @test
     *
     * @dataProvider JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::falsey
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Boolean_Assertion::of(boolean: $arg)->is_not_false();
    }
}
