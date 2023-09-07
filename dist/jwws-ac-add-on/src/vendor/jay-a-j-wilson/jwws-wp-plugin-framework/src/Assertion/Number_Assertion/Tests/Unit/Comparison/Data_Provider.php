<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison;

final class Data_Provider {
    public static function is_equal(): iterable {
        yield 'is equal: positive (int)' => [10, 10];

        yield 'is equal: positive (float)' => [10.0, 10.0];

        yield 'is equal: positive (int); positive (float)' => [10, 10.0];

        yield 'is equal: negative (int)' => [-10, -10];

        yield 'is equal: negative (float)' => [-10.0, -10.0];
    }

    public static function is_less(): iterable {
        yield 'is less: positive (int)' => [10, 11];

        yield 'is less: positive (float)' => [10.0, 11.0];

        yield 'is less: positive (int), positive (float)' => [10, 11.0];

        yield 'is less: negative (int)' => [-10, -9];

        yield 'is less: negative (float)' => [-10.0, -9.0];
    }

    public static function is_greater(): iterable {
        yield 'is greater: positive (int)' => [10, 9];

        yield 'is greater: positive (float)' => [10.0, 9.0];

        yield 'is greater: positive (int), positive (float)' => [10, 9.0];

        yield 'is greater: negative (int)' => [-10, -11];

        yield 'is greater: negative (float)' => [-10.0, -11.0];
    }
}
