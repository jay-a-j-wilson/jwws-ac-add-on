<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Immediate_Dir;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Base_Dir;

// Security::stop_direct_access();

/**
 * Represents a the first parent directory.
 */
final class Immediate_Dir extends Base_Dir {
    protected static function levels(): int {
        return 1;
    }
}
