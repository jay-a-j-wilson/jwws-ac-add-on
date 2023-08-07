<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number;

final class Data_Provider {
    public static function positive_numbers(): iterable {
        yield 'positive (int)' => [1];

        yield 'positive (float)' => [1.0];
    }

    public static function negative_numbers(): iterable {
        yield 'negative (int)' => [-1];

        yield 'negative (float)' => [-1.0];
    }

    public static function naught_numbers(): iterable {
        yield 'zero (int)' => [0];

        yield 'zero (float)' => [0.0];
    }
}
