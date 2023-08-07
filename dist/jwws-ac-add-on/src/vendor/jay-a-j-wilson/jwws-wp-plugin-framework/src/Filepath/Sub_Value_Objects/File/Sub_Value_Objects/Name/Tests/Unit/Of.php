<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Name\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Name::class,
            actual: Name::of(path: 'path'),
        );
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Name::of(path: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no filename' => ['.ext'];

        yield 'in dir, no filename' => ['dir/.ext'];

        yield 'in nested dir, no filename' => ['dir/sub_dir/.ext'];
    }
}
