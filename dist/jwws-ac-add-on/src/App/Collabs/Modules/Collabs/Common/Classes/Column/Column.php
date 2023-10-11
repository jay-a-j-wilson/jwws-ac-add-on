<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Column;

use AC\ListScreen;
use function add_action;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * @codeCoverageIgnore
 */
abstract class Column {
    /**
     * Factory method.
     */
    final public static function new_instance(): static {
        return new static();
    }

    /**
     * @return void
     */
    private function __construct() {}

    final public function hook(): void {
        add_action(
            'acp/column_types',
            [$this, 'register'],
        );
    }

    abstract public function register(ListScreen $list_screen): void;
}
