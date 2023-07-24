<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;

/**
 * @internal
 */
final class Basic_Plugin_Factory {
    /**
     * @throws \InvalidArgumentException
     */
    public static function create(): self {
        return new self(
            value: Standard_Plugin::of_slug(
                slug: 'plugin',
                fallback_name: 'Plugin',
            ),
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public static function create_and_get(): Plugin {
        return self::create()->value;
    }

    /**
     * @return void
     */
    private function __construct(public readonly Plugin $value) {}
}
