<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group;

use AC\Groups;
use function add_action;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

abstract class Group {
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
            'ac/column_groups',
            [$this, 'register'],
        );
    }

    abstract public function register(Groups $groups): void;
}
