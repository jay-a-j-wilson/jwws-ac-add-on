<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion
 *
 * @link https://www.php.net/manual/en/function.is-numeric.php
 *
 * @internal
 *
 * @small
 */
final class Is_Numeric extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Type_Assertion::of(type: $arg)->is_numeric();
    }

    public static function pass_data_provider(): iterable {
        yield 'numeric string' => ['0'];

        yield 'int' => [0];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Type_Assertion::of(type: $arg)->is_numeric();
    }

    public static function throw_data_provider(): iterable {
        yield 'string' => ['a'];

        yield 'boolean' => [false];

        yield 'array' => [[]];

        yield 'null' => [null];
    }
}
