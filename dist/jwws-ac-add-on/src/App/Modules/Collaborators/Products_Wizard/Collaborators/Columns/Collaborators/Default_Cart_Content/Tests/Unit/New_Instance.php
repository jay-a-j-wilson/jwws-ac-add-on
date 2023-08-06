<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Tests\Unit;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Default_Cart_Content;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Default_Cart_Content
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Default_Cart_Content::class,
            actual: Default_Cart_Content::new_instance(),
        );
    }
}