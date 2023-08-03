<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Display_Type\Smart_Filtering\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Display_Type\Smart_Filtering\Smart_Filtering;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Display_Type\Smart_Filtering\Smart_Filtering
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Smart_Filtering::class,
            actual: new Smart_Filtering(),
        );
    }
}
