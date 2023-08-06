<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Tests\Unit;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Products_Wizard;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Products_Wizard
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Products_Wizard::class,
            actual: Products_Wizard::new_instance(),
        );
    }
}
