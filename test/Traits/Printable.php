<?php declare(strict_types=1);

namespace JWWS\ACA\Test\Traits;

trait Printable {
    /**
     * Prints value for debugging.
     */
    final protected static function print(mixed $value): void {
        echo print_r(
            value: $value,
            return: true,
        ) . PHP_EOL;
    }
}
