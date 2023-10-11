<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Global_Stylesheet;
use PHPUnit\Framework\TestCase;
/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Global_Stylesheet
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Global_Stylesheet::class,
            actual: Global_Stylesheet::of(handle: '')
        );
    }
}
