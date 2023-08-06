<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Attach_Wizard\Column\Free\Tests\Integration;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Attach_Wizard\Column\Free\Free;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Attach_Wizard\Column\Free\Free
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
