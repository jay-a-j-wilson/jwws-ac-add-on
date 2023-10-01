<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\True;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Not_True extends TestCase {
    /**
     * @test
     *
     * @dataProvider JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::falsey
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Boolean_Assertion::of(boolean: $arg)->is_not_true();
    }

    /**
     * @test
     *
     * @dataProvider JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::truthy
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Boolean_Assertion::of(boolean: $arg)->is_not_true();
    }
}
