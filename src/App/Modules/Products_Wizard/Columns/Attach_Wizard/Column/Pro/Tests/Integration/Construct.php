<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Attach_Wizard\Column\Pro\Tests\Integration;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Attach_Wizard\Column\Pro\Pro;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Attach_Wizard\Column\Pro\Pro
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
