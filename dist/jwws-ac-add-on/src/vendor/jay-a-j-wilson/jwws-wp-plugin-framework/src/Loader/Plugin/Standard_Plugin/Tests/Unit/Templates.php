<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Unit;

use JWWS\WPPF\Test\Traits\Templateable;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @small
 *
 * @coversNothing
 */
final class Templates extends TestCase {
    use Templateable;

    /**
     * @test
     */
    public function pass(): void {
        self::expectOutputString(
            expectedString: '<strong>Requires:</strong> Plugin 1, Plugin 2',
        );

        echo self::template(
            file: __DIR__ . './../../templates/template.html.php',
            data: ['plugin_names' => 'Plugin 1, Plugin 2'],
        );
    }
}
