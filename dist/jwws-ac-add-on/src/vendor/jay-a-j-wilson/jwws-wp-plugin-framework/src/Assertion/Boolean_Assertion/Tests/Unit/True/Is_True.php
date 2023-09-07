<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Boolean\True;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_True extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::truthy
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Boolean_Assertion::of(boolean: $arg)->is_true();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::falsey
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Boolean_Assertion::of(boolean: $arg)->is_true();
    }
}
