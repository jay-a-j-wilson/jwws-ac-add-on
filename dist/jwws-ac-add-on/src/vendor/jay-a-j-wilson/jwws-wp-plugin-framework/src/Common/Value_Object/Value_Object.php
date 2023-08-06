<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Value object base class.
 */
interface Value_Object extends \Stringable {
    /**
     * Compares this object with another object for equality.
     *
     * Uses (===) not (==).
     *
     * @param self $other the object to compare with
     *
     * @return bool true if the objects are equal, false otherwise
     */
    public function equals(self $other): bool;

    /**
     * {@inheritDoc}
     *
     * Used by factory methods to create complex value objects with cleaner
     * syntax.
     */
    public function __toString(): string;
}
