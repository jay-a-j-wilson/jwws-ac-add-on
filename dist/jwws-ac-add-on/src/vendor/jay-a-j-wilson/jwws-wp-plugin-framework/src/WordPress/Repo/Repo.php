<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * ViewModel Repository
 */
abstract class Repo {
    /**
     * Factory method.
     */
    final public static function new_instance(): static {
        return new static();
    }

    /**
     * Enforces use of factory method.
     *
     * @return void
     */
    protected function __construct() {}

    /**
     * Returns all repository elements.
     */
    abstract public function list_all(): Collection;
}
