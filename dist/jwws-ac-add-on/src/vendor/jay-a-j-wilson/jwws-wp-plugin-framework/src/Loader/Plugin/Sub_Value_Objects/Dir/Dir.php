<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;

// Security::stop_direct_access();

/**
 * Represents the WordPress plugin directory.
 */
final class Dir extends Base_Value_Object {
    /**
     * Factory method.
     */
    public static function create(): self {
        return new self(
            value: WP_PLUGIN_DIR . DIRECTORY_SEPARATOR,
        );
    }
}
