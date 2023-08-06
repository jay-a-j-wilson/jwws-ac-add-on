<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Group\Tests\Unit;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Group\Group;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Group\Group
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
