<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty;

final class Data_Provider {
    /**
     * Values that should be considered empty.
     */
    public static function empty(): iterable {
        yield [''];
    }

    /**
     * Values that should not be considered empty.
     */
    public static function not_empty(): iterable {
        yield ['foo'];

        yield ['empty'];

        yield [' '];

        yield ['null'];

        yield ['false'];

        yield ['0'];

        yield ['00'];

        yield ['0.0'];
    }
}
