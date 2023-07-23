<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Column\Free\Tests\Integration;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Column\Free\Free;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Column\Free\Free
 *
 * @internal
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Free::class,
            actual: new Free(),
        );
    }
}
