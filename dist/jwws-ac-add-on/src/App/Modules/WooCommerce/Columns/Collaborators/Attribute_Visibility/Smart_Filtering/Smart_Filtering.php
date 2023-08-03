<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Smart_Filtering;

use ACP\Search\Comparison;
use ACP\Search\Operators;
use ACP\Search\Query\Bindings\Post;
use ACP\Search\Value;

final class Smart_Filtering extends Comparison {
    /**
     * @throws \LogicException
     *
     * @return void
     */
    public function __construct() {
        $operators = new Operators([
            // Available operators:
            // Operators::EQ = equal
            // Operators::NEQ = not Equal
            // Operators::CONTAINS = Matches a part of a string
            // Operators::NOT_CONTAINS
            // Operators::GT = Greater than
            // Operators::LT = Less than
            // Operators::IS_EMPTY
            // Operators::NOT_IS_EMPTY
            // Operators::BETWEEN
            Operators::EQ,
        ]);

        // Available value types:
        // Value::STRING = Value is a string
        // Value::DATE = Value is a date
        // Value::INT = Value is a whole number e.g. `5`
        // Value::DECIMAL = Value is a number with decimals e.g. `5.1`
        $value = Value::STRING;

        parent::__construct(operators: $operators, value_type: $value);
    }

    /**
     * @param mixed $operator
     */
    protected function create_query_bindings($operator, Value $value) {
        $binding = new Post();

        // Examples:

        // Example #1 - altering the \WP_Meta_Query
        $binding->meta_query(args: [
            'key'     => 'custom_meta_key',
            'value'   => $value->get_value(),
            'compare' => $operator,
        ]);

        // Example #2 - altering the query with custom SQL
        global $wpdb;
        $binding->join(
            join: " INNER JOIN {$wpdb->postmeta} AS my_postmeta ON {$wpdb->posts}.ID = my_postmeta.post_id",
        );
        $binding->where(
            where: $wpdb->prepare(
                query: ' AND my_postmeta.meta_key = \'custom_meta_key\' AND my_postmeta.meta_value = %s',
                args: $value->get_value(),
            ),
        );

        return $binding;
    }
}
