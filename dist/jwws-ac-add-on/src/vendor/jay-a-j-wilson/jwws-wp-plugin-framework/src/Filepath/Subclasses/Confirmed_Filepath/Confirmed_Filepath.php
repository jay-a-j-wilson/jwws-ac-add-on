<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Filepath;

// Security::stop_direct_access();

/**
 * Represents a filepath that exists.
 */
final class Confirmed_Filepath extends Filepath {
    /**
     * @throws \InvalidArgumentException if the file does not exist
     */
    protected static function validate(string $filepath): string {
        Path_Assertion::of(path: $filepath)->exists();

        return $filepath;
    }
}
