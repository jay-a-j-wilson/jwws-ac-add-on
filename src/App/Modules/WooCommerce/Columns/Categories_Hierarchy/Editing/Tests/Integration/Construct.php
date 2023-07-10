<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Categories_Hierarchy\Editing\Tests\Integration;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Categories_Hierarchy\{
    Column\Pro\Pro,
    Editing\Editing
};

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Categories_Hierarchy\Editing\Editing
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
