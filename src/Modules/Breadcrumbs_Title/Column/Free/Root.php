<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Categories_Hierarchy\Column\Free;

use function JWWS\WP_Plugin_Framework\Functions\Debug\log_error;

class Root extends \AC\Column {
    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'acp/column_types',
            [__CLASS__, 'register'],
        );
    }

    /**
     * @param \AC\ListScreen $list_screen
     *
     * @return void
     */
    public static function register(\AC\ListScreen $list_screen): void {
        log_error($list_screen->get_key());
        if ('product' === $list_screen->get_key()) {
            $list_screen->register_column_type(new self());
        }
    }

    /**
     *
     */
    public function __construct() {
        // Identifier, pick an unique name.
        // Single word, no spaces. Underscores allowed.
        $this->set_type(type: 'column-categories_hierarchy');

        // Default column label.
        $this->set_label(label: __('Categories (Hierarchy)', 'jwws'));
    }

    /**
     * Returns the display value for the column.
     *
     * @param mixed $post_id ID
     *
     * @return string Value
     */
    public function get_value(mixed $post_id): string {
        return $this->get_raw_value(post_id: $post_id);

        // get raw value
        $value = $this->get_raw_value(post_id: $post_id);

        // optionally you can change the display of the value. In this example we added a post link.
        return '<a href="' . esc_url(url: get_permalink(post: $post_id)) . '">' . $value . '</a>';
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     *
     * @param mixed $post_id ID
     *
     * @return mixed Value
     */
    public function get_raw_value(mixed $post_id): mixed {
        // put all the column logic here to retrieve the value you need
        // For example: $value = get_post_meta( $post_id, '_my_custom_field_example', true );

        $categories = get_the_terms(
            post: $post_id,
            taxonomy: 'product_cat',
        );

        if (! $categories) {
            return '';
        }

        foreach ($categories as $category) {
            unset($all_categories); // reset array

            $ancestor_ids = get_ancestors(
                object_id: $category->term_id,
                object_type: $category->taxonomy,
            );

            if ($ancestor_ids) {
                $all_categories = $this->get_ancestor_names($ancestor_ids);
            }
            
            $all_categories[] = $category->name;

            $output[] = implode(array: $all_categories, separator: ' <span style="color: #999">&raquo;</span> ');
        }

        return implode(array: $output, separator: '<br><br>');

        // return 'something';
    }

        /**
     * @param array $ancestor_ids 
     * 
     * @return array 
     */
    private function get_ancestor_names(array $ancestor_ids): array {
        foreach ($ancestor_ids as $ancestor_id) {
            $ancestor_names[] = '<span style="color: #999">' . get_term(term: $ancestor_id)->name . '</span>';
        }

        return array_reverse($ancestor_names);
    }

    /**
     * (Optional) Create extra settings for you column.
     * These are visible when editing a column.
     * You can remove this function is you do not use it!
     *
     * Write your own settings or use any of the standard available settings.
     */
    protected function register_settings(): void {
        // NOTE! When you use any of these settings, you should remove the
        // get_value() method from this column, because the value will be
        // rendered by the AC_Settings_Column_{$type} classes.

        // Display an image preview size settings screen
        // $this->add_setting( new \AC\Settings\Column\Image( $this ) );

        // Display an excerpt length input field in words
        // $this->add_setting( new \AC\Settings\Column\WordLimit( $this ) );

        // Display an excerpt length input field in characters
        // $this->add_setting( new \AC\Settings\Column\CharacterLimit( $this ) );

        // Display a date format settings input field
        // $this->add_setting( new \AC\Settings\Column\Date( $this ) );

        // Display before and after input fields
        // $this->add_setting( new \AC\Settings\Column\BeforeAfter( $this ) );

        // Displays a dropdown menu with user display formats
        // $this->add_setting( new \AC\Settings\Column\User( $this ) );

        // Displays a dropdown menu with post display formats
        // $this->add_setting( new \AC\Settings\Column\Post( $this ) );
    }

    /**
     * (Optional) Is valid.
     * You can remove this function is you do not use it!
     *
     * This determines whether the column should be available. If you want to
     * disable this column for a particular post type you can set this to false.
     *
     * @return bool true/False Default should be 'true'
     */
    public function is_valid(): bool {
        // Example: if the post type does not support thumbnails then return false
        // if ( ! post_type_supports( $this->get_post_type(), 'thumbnail' ) ) {
        //    return false;
        // }

        return true;
    }

    /**
     * (Optional) Enqueue CSS + JavaScript on the admin listings screen.
     * You can remove this function is you do not use it!
     *
     * This action is called in the admin_head action on the listings screen
     * where your column values are displayed.
     *
     * Use this action to add CSS + JavaScript
     */
    public function scripts(): void {
        wp_enqueue_script(
            handle: 'jwws-column_name',
            src: plugin_dir_url(file: __FILE__) . '../../assets/js/scripts.js',
        );

        wp_enqueue_style(
            handle: 'jwws-column_name',
            src: plugin_dir_url(file: __FILE__) . '../../assets/css/styles.css',
        );
    }
}
