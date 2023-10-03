<?php declare(strict_types=1);

namespace JWWS\ACA\App\Common\Utils;

final class Collection {
    /**
     * @return void
     */
    private function __construct() {}

    /**
     * Transforms each item in an array into something else.
     *
     * Use for…
     * - Extracting a field from an array of objects, such as mapping customers
     * into their email addresses:
     * ```
     * $emails = map(
     *     items: $customers,
     *     func: fn ($customer) => $customer->email
     * );
     * ```
     * - Populating an array of objects from raw data, like mapping an array of
     * JSON results into an array of domain objects:
     * ```
     * $products = map(
     *     items: $productJson,
     *     func: fn ($productData) => new Product($productData)
     * );
     * ```
     * - Converting items into a new format, for example mapping an array of
     * prices in cents into a displayable format:
     * ```
     * $displayPrices = map(
     *     items: $prices,
     *     func: fn ($price) => '$' . number_format(
     *         num: $price / 100,
     *         decimals: 2
     *     )
     * );
     * ```
     */
    public static function map(array $items, callable $func): array {
        $results = [];

        foreach ($items as $item) {
            $results[] = $func($item);
        }

        return $results;
    }

    /**
     *  Uses the item as both the key and the value in the result array.
     */
    public static function map_keys(array $items, callable $func): array {
        $result = [];

        foreach ($items as $item) {
            $result[$item] = $func($item);
        }

        return $result;
    }

    public static function each(array $items, callable $func): void {
        foreach ($items as $item) {
            $func($item);
        }
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
        return self::filter(
            items: $items,
            func: fn ($item) => ! $func($item),
        );
    }
}
