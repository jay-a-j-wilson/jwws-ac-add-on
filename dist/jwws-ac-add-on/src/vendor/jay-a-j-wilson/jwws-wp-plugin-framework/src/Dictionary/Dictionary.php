<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Dictionary;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

interface Dictionary extends \Countable {
    /**
     * Factory method.
     */
    public static function new_instance(): self;

    /**
     * Fetches all the dictionary entries.
     */
    public function list_all(): array;

    /**
     * Fetches the value of an entry by the given key.
     */
    public function find_by_key(string $key): string;

    /**
     * Adds an entry to the dictionary.
     */
    public function add(string $key, string $value): self;

    /**
     * Removes an entry to the dictionary.
     */
    public function remove(string $key): self;

    /**
     * Clears all entries in the dictionary.
     */
    public function clear(): self;

    /**
     * Counts the number of entries in the dictionary.
     */
    public function count(): int;
}
