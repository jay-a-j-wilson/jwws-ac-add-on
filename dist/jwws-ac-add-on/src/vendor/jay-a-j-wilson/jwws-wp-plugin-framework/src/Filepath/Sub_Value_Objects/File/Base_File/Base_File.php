<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Enums\Ext;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\File;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents a file basename.
 */
abstract class Base_File extends Base_Value_Object implements File {
    /**
     * Returns file extension type.
     */
    abstract protected static function type(): Ext;

    /**
     * Static factory method.
     */
    final public static function of(string $path): static {
        return new static(
            value: Name::of(path: $path) . '.' . static::type()->value,
        );
    }
}
