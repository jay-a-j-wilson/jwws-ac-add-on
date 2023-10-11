<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Options\Tests\Unit;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Options\Options;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Options\Options
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
            expected: Options::class,
            actual: Options::of(
                column: $this->createStub(originalClassName: Column::class)
            ),
        );
    }
}
