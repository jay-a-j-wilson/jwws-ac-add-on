<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Integration\Fixtures\Fixture;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo
 *
 * @internal
 *
 * @small
 */
final class Find_By_Id extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: ($_dataName) arg $arg returns $arg
     */
    public function pass(int $arg): void {
        self::assertSame(
            expected: $arg,
            actual: User_Repo::new_instance()->find_by_id(id: $arg)->ID,
        );
    }

    public static function pass_data_provider(): iterable {
        yield [1];

        // yield [2];

        // yield [3];

        // yield [4];

        // yield [5];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: ($_dataName) arg $arg throws e
     */
    public function throw(int $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        User_Repo::new_instance()->find_by_id(id: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'zero' => [0];

        yield 'negative number' => [-1];

        // yield 'non existing' => [6];
    }
}
