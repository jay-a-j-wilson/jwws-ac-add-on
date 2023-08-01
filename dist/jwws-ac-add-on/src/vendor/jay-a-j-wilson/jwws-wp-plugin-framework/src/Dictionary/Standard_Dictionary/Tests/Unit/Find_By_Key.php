<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
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
final class Find_By_Key extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: 'value_1',
            actual: Dictionary_Factory::create_and_get()
                ->find_by_key(key: 'key_1'),
        );
    }

    /**
     * @test
     */
    public function throw(): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        $this->expectExceptionMessage(
            message: 'Entry with key of key_3 not found.',
        );

        Dictionary_Factory::create_and_get()
            ->find_by_key(key: 'key_3')
        ;
    }
}
