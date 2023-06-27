<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Editing\Tests\Integration;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\{
    Editing\Editing,
    Column\Pro\Pro
};

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Editing\Editing
 *
 * @internal
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
                    originalClassName: Pro::class
                )
            ),
        );
    }
}
