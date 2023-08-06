<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;

// Security::stop_direct_access();

/**
 * Represents a filename.
 */
final class Name extends Base_Value_Object {
    /**
     * Factory method.
     */
    public static function of(string $path): self {
        String_Assertion::of(string: $path)->is_not_empty();
        // Assertion::of(value: $path)->valid_chars();

        return new self(
            value: self::validate(
                filename: self::filename(path: $path),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function filename(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_FILENAME);
    }

    /**
     * @throws \InvalidArgumentException if blank
     */
    private static function validate(string $filename): string {
        String_Assertion::of(string: $filename)
            ->is_not_empty(message: 'Filename cannot be empty.')
        ;

        return $filename;
    }
}
