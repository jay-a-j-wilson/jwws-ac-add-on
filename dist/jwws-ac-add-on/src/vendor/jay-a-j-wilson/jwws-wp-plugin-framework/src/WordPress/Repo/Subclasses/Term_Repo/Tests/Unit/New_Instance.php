<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo
 *
 * @internal
 *
 * @small
 */
final class New_Instance extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Term_Repo::class,
            actual: Term_Repo::new_instance(),
        );
    }
}
