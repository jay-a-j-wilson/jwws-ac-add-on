<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Group\Tests\Unit;

use JWWS\ACA\App\Modules\Products_Wizard\Group\Group;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Products_Wizard\Group\Group
 *
 * @internal
 */
final class Construct extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Group::class,
            actual: Group::new_instance(),
        );
    }
}
