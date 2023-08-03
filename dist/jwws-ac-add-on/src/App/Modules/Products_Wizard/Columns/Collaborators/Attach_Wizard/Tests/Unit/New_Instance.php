<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Attach_Wizard\Tests\Unit;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Attach_Wizard\Attach_Wizard;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Attach_Wizard\Attach_Wizard
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Attach_Wizard::class,
            actual: Attach_Wizard::new_instance(),
        );
    }
}
