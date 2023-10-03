<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit\Fixtures\Dictionary_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Standard_Dictionary\Standard_Dictionary
 *
 * @internal
 *
 * @small
 */
final class List_All extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: [
                'key_1' => 'value_1',
                'key_2' => 'value_2',
            ],
            actual: Dictionary_Factory::create_and_get()
                ->list_all(),
        );
    }
}
