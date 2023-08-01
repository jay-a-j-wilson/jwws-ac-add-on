<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Immediate_Dir\Immediate_Dir;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;

// Security::stop_direct_access();

/**
 * Represents a WordPress Plugin's basename.
 */
final class Basename extends Base_Value_Object {
    /**
     * @param string $path the plugin's basename "plugin-folder/plugin-file.php"
     */
    public static function of(string $basename): self {
        return new self(
            value: Unconfirmed_Filepath::of(
                dir: Immediate_Dir::of(path: $basename),
                file: PHP_File::of(path: $basename),
            ),
        );
    }
}
