<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo
 *
 * @internal
 *
 * @small
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 7,
            haystack: Taxonomy_Repo::new_instance()->list_all(),
        );
    }

    /**
     * @test
     */
    private function print(): void {
        echo print_r(
            value: Taxonomy_Repo::new_instance()
                ->list_all()
                ->pluck(key: 'name')
                ->implode(separator: PHP_EOL),
            return: true,
        ) . PHP_EOL;
    }
}
