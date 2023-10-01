<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;

/**
 * @internal
 */
final class Collection_Factory {
    public static function create(): self {
        return new self(
            value: Standard_Collection::of(
                'one',
                'two',
                'three',
                'four',
                'five',
            ),
        );
    }

    public static function create_and_get(): Collection {
        return self::create()->value;
    }

    /**
     * @return void
     */
    private function __construct(public readonly Collection $value) {}
}
