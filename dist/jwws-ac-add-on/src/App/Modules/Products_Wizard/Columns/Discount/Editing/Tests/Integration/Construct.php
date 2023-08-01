<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Discount\Editing\Tests\Integration;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Discount\Column\Pro\Pro;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Discount\Editing\Editing;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Discount\Editing\Editing
 *
 * @internal
 *
 * @small
 */
final class Construct extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Editing::class,
            actual: new Editing(
                column: $this->createStub(
                    originalClassName: Pro::class,
                ),
            ),
        );
    }
}
