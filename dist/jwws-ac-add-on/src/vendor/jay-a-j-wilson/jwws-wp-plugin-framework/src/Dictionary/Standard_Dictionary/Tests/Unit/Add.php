<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit\Fixtures\Dictionary_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Standard_Dictionary\Standard_Dictionary
 *
 * @internal

 * @small
 */
final class Add extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 2,
            haystack: Dictionary_Factory::create_and_get(),
        );
    }
}
