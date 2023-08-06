<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Categories_Hierarchy\Filtering\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Categories_Hierarchy\Filtering\Filtering;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Categories_Hierarchy\Filtering\Filtering
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Filtering::class,
            actual: new Filtering(
                column: $this->createStub(
                    originalClassName: Column::class,
                ),
            ),
        );
    }
}
