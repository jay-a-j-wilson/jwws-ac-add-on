<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Position\Column\Free\Tests\Integration;

use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Position\Column\Free\Free;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Attribute_Position\Column\Free\Free
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
