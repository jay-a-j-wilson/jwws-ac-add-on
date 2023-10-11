<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading\Heading;
use PHPUnit\Framework\TestCase;
/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading\Heading
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
            expected: Heading::class,
            actual: Heading::of(label: '', tip: '')
        );
    }
}
