<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WooCommerce;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Utility\Generic;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Utility\Utility as WordPress;

// Security::stop_direct_access();

/**
 * Utility.
 */
final class WooCommerce {
    /**
     * Do not instantiate.
     */
    private function __construct() {}

    /**
     * Gets the product categories ordered by parent and alphabetized.
     */
    public static function get_product_categories(): array {
        return Generic::flatten(
            objects: WordPress::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
            key: 'children',
        );
    }
}
