<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Tests\Unit;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Steps_Settings;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Steps_Settings
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Steps_Settings::class,
            actual: Steps_Settings::new_instance(),
        );
    }
}
