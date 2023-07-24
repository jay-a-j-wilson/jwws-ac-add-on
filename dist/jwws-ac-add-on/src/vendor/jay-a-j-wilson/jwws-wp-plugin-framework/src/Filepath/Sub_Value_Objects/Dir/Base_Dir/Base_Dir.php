<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Dir;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents a directory.
 */
abstract class Base_Dir extends Base_Value_Object implements Dir {
    /**
     * Returns the parent directory level to return.
     *
     * @param int $levels 0 for all
     */
    abstract protected static function levels(): int;

    /**
     * Undocumented function.
     */
    final public static function of(string $path): static {
        String_Assertion::of(string: $path)->is_not_empty();

        $dir = self::format(
            path: self::dir(path: $path),
        );

        String_Assertion::of(string: $dir)
            ->is_not_empty(message: 'Directory must not be empty.')
        ;

        return new static(
            value: $dir,
        );
    }

    /**
     * Returns directory from the path.
     */
    private static function dir(string $path): string {
        return Standard_Collection::of(...explode(
            separator: DIRECTORY_SEPARATOR,
            string: \dirname(path: $path),
        ))
            ->slice(offset: -static::levels())
            ->implode(separator: DIRECTORY_SEPARATOR)
        ;
    }

    /**
     * Removes the period (.) from empty directories for cleaner filepath
     * building.
     */
    private static function format(string $path): string {
        return $path === '.'
            ? ''
            : $path . DIRECTORY_SEPARATOR;
    }
}
