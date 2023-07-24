<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Dir;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\File;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Will always return a directory and a file.
 */
abstract class Filepath extends Base_Value_Object {
    /**
     * Factory method.
     */
    final public static function of(Dir $dir, File $file): static {
        return new static(
            value: static::validate(
                filepath: "{$dir}{$file}",
            ),
        );
    }

    /**
     * Undocumented function.
     */
    protected static function validate(string $filepath): string {
        return $filepath;
    }
}
