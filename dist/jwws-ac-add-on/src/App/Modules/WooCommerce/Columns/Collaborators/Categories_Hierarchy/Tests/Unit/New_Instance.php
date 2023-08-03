<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Categories_Hierarchy\Tests\Unit;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Categories_Hierarchy\Categories_Hierarchy;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Categories_Hierarchy\Categories_Hierarchy
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Categories_Hierarchy::class,
            actual: Categories_Hierarchy::new_instance(),
        );
    }
}
