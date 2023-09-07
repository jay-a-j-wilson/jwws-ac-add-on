<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit\Null;

/**
 * @link https://www.php.net/manual/en/function.is-null.php
 */
final class Data_Provider {
    /**
     * Values equal to not null.
     */
    public static function null(): iterable {
        yield 'null' => [null];
    }

    /**
     * Values equal to not null.
     */
    public static function not_null(): iterable {
        yield 'boolean' => [true];

        yield 'integer' => [0];

        yield 'string' => ['a'];

        yield 'string (empty)' => [''];

        yield 'float' => [0.0];

        yield 'float (negative)' => [-0.0];

        yield 'array' => [[1, 2, 3, 4]];
    }
}
