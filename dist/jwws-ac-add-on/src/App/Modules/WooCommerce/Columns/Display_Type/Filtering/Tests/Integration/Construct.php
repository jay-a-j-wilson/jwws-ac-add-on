<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Filtering\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Filtering\Filtering;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Filtering\Filtering
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