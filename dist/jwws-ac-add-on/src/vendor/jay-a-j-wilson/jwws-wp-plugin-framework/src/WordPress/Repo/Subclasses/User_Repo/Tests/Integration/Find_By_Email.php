<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
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
final class Find_By_Email extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: ($_dataName) arg $arg returns $arg
     */
    public function pass(string $arg): void {
        self::assertSame(
            expected: $arg,
            actual: User_Repo::new_instance()->find_by_email(email: $arg)->user_email,
        );
    }

    public static function pass_data_provider(): iterable {
        yield ['admin@example.org'];

        // yield ['user_0000018@example.org'];

        // yield ['user_0000019@example.org'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: ($_dataName) arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        User_Repo::new_instance()->find_by_email(email: $arg)->user_email;
    }

    public static function throw_data_provider(): iterable {
        yield 'non existing' => ['user@example.org'];
    }
}
