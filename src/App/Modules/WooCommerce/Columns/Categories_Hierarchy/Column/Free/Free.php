<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Categories_Hierarchy\Column\Free;

use AC\Column;

class Free extends Column {
    /**
     * Identifier, pick an unique name.
     * Single word, no spaces. Underscores allowed.
     */
    private string $uid = 'column-categories_hierarchy';

    public function __construct() {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: 'woocommerce')
            // Default column label.
            ->set_label(
                label: __(
                    text: 'Categories Hierarchy (Custom)',
                    domain: 'jwws',
                ),
            )
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $post_id): string {
        return $this->get_raw_value(post_id: $post_id);
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
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
                $all_categories = $this->get_ancestor_names(
                    ancestor_ids: $ancestor_ids,
                );
            }

            $all_categories[] = $category->name;

            $output[] = implode(
                array: $all_categories,
                separator: ' <span style="color: #999">&raquo;</span> ',
            );
        }

        return implode(array: $output, separator: '<br><br>');
        // return 'something';
    }

    private function get_ancestor_names(array $ancestor_ids): array {
        foreach ($ancestor_ids as $ancestor_id) {
            $ancestor_names[] = '<span style="color: #999">' . get_term(term: $ancestor_id)->name . '</span>';
        }

        return array_reverse(array: $ancestor_names);
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
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . '../../assets/js/scripts.js',
        );

        wp_enqueue_style(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . '../../assets/css/styles.css',
        );
    }
}
