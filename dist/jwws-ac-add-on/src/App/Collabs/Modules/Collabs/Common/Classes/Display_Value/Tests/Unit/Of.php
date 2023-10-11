<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Display_Value\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Display_Value\Display_Value;
use PHPUnit\Framework\TestCase;
/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Display_Value\Display_Value
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
            expected: Display_Value::class,
            actual: Display_Value::of(value: '')
        );
    }
}
