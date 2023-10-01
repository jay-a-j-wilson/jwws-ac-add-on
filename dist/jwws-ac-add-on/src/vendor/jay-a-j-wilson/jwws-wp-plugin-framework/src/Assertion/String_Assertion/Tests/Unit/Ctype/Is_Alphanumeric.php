<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
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
final class Is_Alphanumeric extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $arg)->is_alphanumeric();
    }

    public static function pass_data_provider(): iterable {
        yield 'lowercase letter' => ['a'];

        yield 'uppercase letter' => ['B'];

        yield 'number' => ['1'];

        yield 'lowercase letter, uppercase letter, number' => ['aB1'];
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype\Data_Provider::special_characters
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $arg)->is_alphanumeric();
    }
}
