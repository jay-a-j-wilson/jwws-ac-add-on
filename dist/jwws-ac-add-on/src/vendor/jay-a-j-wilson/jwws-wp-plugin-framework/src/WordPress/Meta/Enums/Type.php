<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Enums;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Object metadata types.
 *
 * @link https://developer.wordpress.org/reference/functions/get_metadata/
 */
enum Type: string {
    case POST = 'post';

    case COMMENT = 'comment';

    case TERM = 'term';

    case USER = 'user';
}
