<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta
 *
 * @internal
 *
 * @small
 */
final class Callback extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2, $arg_3, $arg_4
     */
    public function pass(
        Plugin $arg_1,
        string $arg_2,
        array $arg_3,
        array $arg_4,
    ): void {
        self::assertSame(
            expected: $arg_4,
            actual: Plugin_Row_Meta::of(plugin: $arg_1)
                ->callback(
                    plugin_meta: $arg_3,
                    plugin_file: $arg_2,
                ),
        );
    }

    public static function pass_data_provider(): iterable {
        $meta_data = [
            'Version 5.0',
            'By <a href="https://automattic.com/wordpress-plugins/">Automattic</a>',
            '<a href="https://local.cleanwpinstall.com/wp-admin/plugin-install.php?tab=plugin-information&#038;plugin=akismet&#038;TB_iframe=true&#038;width=600&#038;height=550" class="thickbox open-plugin-details-modal" aria-label="More information about Akismet Anti-Spam" data-title="Akismet Anti-Spam">View details</a>',
        ];

        yield 'no deps' => [
            Akismet_Plugin_Factory::create_and_get(),
            'akismet/akismet.php',
            $meta_data,
            $meta_data,
        ];

        yield 'invalid basename' => [
            Akismet_Plugin_Factory::create_and_get()
                ->add_dependencies(plugins: Basic_Plugin_Factory::create_and_get()),
            'plugin/plugin.php',
            $meta_data,
            $meta_data,
        ];

        yield 'valid' => [
            Akismet_Plugin_Factory::create_and_get()
                ->add_dependencies(plugins: Basic_Plugin_Factory::create_and_get()),
            'akismet/akismet.php',
            $meta_data,
            [...$meta_data, '<strong>Requires:</strong> Plugin'],
        ];
    }
}
