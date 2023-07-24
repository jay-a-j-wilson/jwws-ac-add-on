<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;

// Security::stop_direct_access();

/**
 * Represents a plugin's filepath.
 */
final class Filepath extends Base_Value_Object {
    /**
     * @param string $basename example plugin-folder/plugin-file.php
     */
    public static function of(string $basename): self {
        return new self(
            value: Dir::create() . Basename::of(basename: $basename),
        );
    }
}
