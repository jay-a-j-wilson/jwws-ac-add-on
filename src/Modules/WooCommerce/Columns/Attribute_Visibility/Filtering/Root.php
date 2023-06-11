<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns\Attribute_Visibility\Filtering;

class Root extends \ACP\Filtering\Model {
    /**
     *
     */
    public function get_filtering_data() {
        return [
            'options' => [
                'value' => 'Label',
            ],
        ];

        // (Optional) Order the options in the drop down menu
        // $data['order'] = true;

        // (Options) show empty options in the drop down.
        // $data['empty_option'] = true;
    }

    /**
     * @param mixed $vars
     */
    public function get_filtering_vars($vars) {
        // All actual filtering logic goes here, you'll need to alter the
        // WP_Query.
        // $vars contains all WP_Query vars

        // Example of Meta Query filter
        $vars['meta_query'][] = [
            // For Meta columns, you can use $column->get_meta_key()
            'key'   => 'meta_key',
            'value' => $this->get_filter_value(),
        ];

        // Example of altering query
        // add_filter( 'posts_where', array( $this, 'filter_by_custom_query' ), 10, 2 );

        // Always return $vars
        return $vars;
    }

    /**
     * @param mixed     $where
     * @param \WP_Query $query
     */
    public function filter_by_custom_query($where, \WP_Query $query) {
        global $wpdb;

        if ($query->is_main_query()) {
            // Alter the Where clauses with SQL
            $where .= " AND {$wpdb->posts}.post_title = 'Something'"; 
        }

        return $where;
    }
}
