<?php declare(strict_types=1);

namespace JWWS\ACA\App\Common\Column;

use AC\ListScreen;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

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
