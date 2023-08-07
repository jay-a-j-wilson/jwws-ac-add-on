<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Equal extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $actual equals $expected
     */
    public function pass(string $actual, mixed $expected): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $actual)->is_equal(value: $expected);
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['hello world', 'hello world'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $actual not equals $expected
     */
    public function throw(string $actual, mixed $expected): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $actual)->is_equal(value: $expected);
    }

    public static function throw_data_provider(): iterable {
        yield 'letters' => ['hello world', 'foo'];

        yield 'whitespace' => ['hello world', ' hello world '];
    }
}
