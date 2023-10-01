<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 *
 * @small
 */
final class Callback extends \WP_UnitTestCase {
    /**
     * @xtest
     */
    public function pass(): void {
        $dependency = Basic_Plugin_Factory::create_and_get()
            ->add_dependencies(
                Akismet_Plugin_Factory::create_and_get(),
            )
        ;

        $sut = Admin_Init::of(
            plugin: $dependency,
        );

        $sut->callback();

        self::assertTrue($dependency->is_active());
    }
}
