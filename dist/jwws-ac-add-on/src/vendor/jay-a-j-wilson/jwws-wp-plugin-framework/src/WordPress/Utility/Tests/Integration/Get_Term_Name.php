<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Utility\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Utility\Tests\Integration\Fixtures\Fixture;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Utility\Utility;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Utility\Utility
 *
 * @internal
 *
 * @small
 */
final class Get_Term_Name extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(int $arg_1, string $arg_2): void {
        $this->expectOutputString(expectedString: $arg_2);

        echo Utility::get_term_name(
            term: \WP_Term::get_instance(term_id: $arg_1),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'root' => [6, 'Fruit'];

        yield 'level 1' => [7, '- Citrus'];

        yield 'level 2' => [8, '- - Lemon'];
    }
}
