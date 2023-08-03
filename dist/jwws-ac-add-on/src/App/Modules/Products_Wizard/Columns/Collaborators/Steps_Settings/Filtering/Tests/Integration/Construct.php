<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Filtering\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Filtering\Filtering;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Filtering\Filtering
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
