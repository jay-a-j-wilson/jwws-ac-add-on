<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo
 *
 * @internal
 *
 * @small
 */
final class Find_By_Name extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $arg
     */
    public function pass(string $arg): void {
        self::assertSame(
            expected: $arg,
            actual: Post_Type_Repo::new_instance()
                ->find_by_name(name: $arg)
                ->name,
        );
    }

    public static function pass_data_provider(): iterable {
        yield ['post'];

        yield ['page'];

        yield ['attachment'];

        yield ['revision'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Post_Type_Repo::new_instance()->find_by_name(name: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield [''];

        yield ['invalid'];
    }
}
