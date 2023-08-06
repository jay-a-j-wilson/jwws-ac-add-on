<?php declare(strict_types=1);

namespace JWWS\ACA\App\Tests\Integrated;

use JWWS\ACA\App\App;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Loader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\App
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
            expected: App::class,
            actual: App::of(loader: $this->createStub(Loader::class)),
        );
    }
}
