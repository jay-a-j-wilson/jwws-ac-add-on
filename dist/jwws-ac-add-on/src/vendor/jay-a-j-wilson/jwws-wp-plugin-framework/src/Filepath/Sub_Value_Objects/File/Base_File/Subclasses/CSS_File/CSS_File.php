<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Base_File;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Enums\Ext;

// Security::stop_direct_access();

/**
 * CSS File factory.
 */
final class CSS_File extends Base_File {
    protected static function type(): Ext {
        return Ext::CSS;
    }
}
