<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Tests\Null;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Not_Null extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit\Null\Data_Provider::not_null
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Type_Assertion::of(type: $arg)->is_not_null();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit\Null\Data_Provider::null
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Type_Assertion::of(type: $arg)->is_not_null();
    }
}
