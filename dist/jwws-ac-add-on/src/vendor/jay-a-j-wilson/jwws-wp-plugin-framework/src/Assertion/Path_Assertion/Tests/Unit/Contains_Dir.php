<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion
 *
 * @internal
 *
 * @small
 */
final class Contains_Dir extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg contains directory.
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: $arg)->contains_dir();
    }

    public static function pass_data_provider(): iterable {
        yield ['folder/file.txt'];

        yield ['folder/.txt'];

        yield ['folder/subfolder/file.html'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg not contains directory.
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: $arg)->contains_dir();
    }

    public static function throw_data_provider(): iterable {
        yield ['file.txt'];

        yield ['.txt'];

        yield ['file.html.php'];
    }
}
