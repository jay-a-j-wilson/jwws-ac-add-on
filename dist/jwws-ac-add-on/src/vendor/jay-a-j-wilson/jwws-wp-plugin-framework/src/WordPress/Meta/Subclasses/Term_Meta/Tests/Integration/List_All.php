<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta\Term_Meta;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta\Term_Meta
 *
 * @internal
 *
 * @small
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        add_term_meta(
            term_id: 1,
            meta_key: 'key',
            meta_value: 'value',
        );

        self::assertSame(
            expected: [
                'key' => [
                    0 => 'value',
                ],
            ],
            actual: Term_Meta::of(id: 1)
                ->list_all(),
        );
    }
}
