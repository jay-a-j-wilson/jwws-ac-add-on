<?php declare(strict_types=1);

namespace JWWS\ACA\App\Common\Utils;

final class Collection {
    /**
     * @return void
     */
    private function __construct() {}

    public static function each(array $items, callable $func): void {
        foreach ($items as $item) {
            $func($item);
        }
    }

    public static function map(array $items, callable $func): array {
        $results = [];

        foreach ($items as $item) {
            $results[] = $func($item);
        }

        return $results;
    }

    public static function filter(array $items, callable $func): array {
        $result = [];

        foreach ($items as $item) {
            if ($func($item)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    public static function reject(array $items, callable $func): array {
        return self::filter(items: $items, func: fn ($item) => ! $func($item));
    }
}
