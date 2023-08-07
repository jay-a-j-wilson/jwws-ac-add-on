<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo
 *
 * @internal
 *
 * @small
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: User_Repo::new_instance());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: User_Repo::class,
            actual: User_Repo::new_instance(),
        );
    }
}
