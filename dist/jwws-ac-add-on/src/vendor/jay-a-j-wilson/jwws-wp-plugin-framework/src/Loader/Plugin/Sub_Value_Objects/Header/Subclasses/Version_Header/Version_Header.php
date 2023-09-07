<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Version_Header;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums\Type;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Header;

// Security::stop_direct_access();

/**
 * Represents the plugin's version header value object.
 */
final class Version_Header extends Header {
    /**
     * Undocumented function.
     */
    protected static function type(): Type {
        return Type::VERSION;
    }
}
