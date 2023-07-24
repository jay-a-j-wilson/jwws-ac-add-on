<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Alphabetic extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $arg)->is_alphabetic();
    }

    public static function pass_data_provider(): iterable {
        yield ['a'];

        yield ['B'];

        yield ['aB'];
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype\Data_Provider::special_characters
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype\Data_Provider::number_characters
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $arg)->is_alphabetic();
    }
}
