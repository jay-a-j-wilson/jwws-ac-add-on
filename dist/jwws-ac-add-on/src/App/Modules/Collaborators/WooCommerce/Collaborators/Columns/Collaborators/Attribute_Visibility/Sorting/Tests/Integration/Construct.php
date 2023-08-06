<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Visibility\Sorting\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Visibility\Sorting\Sorting;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Visibility\Sorting\Sorting
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Sorting::class,
            actual: new Sorting(
                column: $this->createStub(
                    originalClassName: Column::class,
                ),
            ),
        );
    }
}