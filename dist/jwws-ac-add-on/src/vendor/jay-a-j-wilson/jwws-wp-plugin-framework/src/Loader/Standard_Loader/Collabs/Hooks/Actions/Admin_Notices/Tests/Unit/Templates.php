<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices\Tests\Unit;

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
        $plugin_name     = 'Plugin 1';
        $dependency_name = 'Plugin 2';

        self::expectOutputString(
            expectedString: $this->render(
                plugin_name: $plugin_name,
                dependency_name: $dependency_name,
            ),
        );

        echo self::template(
            file: __DIR__ . './../../templates/template.html.php',
            data: [
                'plugin_name'     => $plugin_name,
                'dependency_name' => $dependency_name,
            ],
        );
    }

    private function render(
        string $plugin_name,
        string $dependency_name,
    ): string {
        return <<<EOD
<div class="notice notice-error">
    <p>
        Sorry, the
        <strong>{$plugin_name}</strong>
        plugin needs the
        <strong>{$dependency_name}</strong>
        plugin to be installed and activated.
    </p>
</div>
EOD;
    }
}
