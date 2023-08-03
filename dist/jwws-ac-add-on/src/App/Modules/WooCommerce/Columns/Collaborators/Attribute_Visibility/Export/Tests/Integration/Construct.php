<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Export\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Export\Export;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Export\Export
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Export::class,
            actual: new Export(
                column: $this->createStub(
                    originalClassName: Column::class,
                ),
            ),
        );
    }
}
