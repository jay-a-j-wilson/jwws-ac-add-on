<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Discount\Tests\Unit;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Discount\Discount;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Discount\Discount
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Discount::class,
            actual: Discount::new_instance(),
        );
    }
}
