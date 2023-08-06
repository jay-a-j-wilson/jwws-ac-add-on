<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WooCommerce\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WooCommerce\WooCommerce;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WooCommerce\WooCommerce
 *
 * @internal
 *
 * @small
 */
final class Get_Product_Categories extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::expectNotToPerformAssertions();
        // WooCommerce::get_product_categories();
    }
}
