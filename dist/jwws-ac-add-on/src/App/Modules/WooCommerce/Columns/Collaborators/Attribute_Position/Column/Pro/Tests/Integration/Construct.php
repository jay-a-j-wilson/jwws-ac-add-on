<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Position\Column\Pro\Tests\Integration;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Position\Column\Pro\Pro;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Position\Column\Pro\Pro
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Pro::class,
            actual: new Pro(),
        );
    }
}
