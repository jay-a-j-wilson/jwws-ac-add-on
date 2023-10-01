<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration\Fixtures\Fixture;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo
 *
 * @internal
 *
 * @small
 */
final class List_All extends Fixture {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 5,
            haystack: Term_Repo::new_instance()->list_all(),
        );
    }
}
