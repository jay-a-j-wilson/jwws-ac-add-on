<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Editing\Tests\Integration;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Column\Pro\Pro;
use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Editing\Editing;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Editing\Editing
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