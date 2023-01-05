<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Breadcrumbs_Title\Column\Free;

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
        if ('wp-taxonomy_product_cat' === $list_screen->get_key()) {
            $list_screen->register_column_type(new self());
        }
    }

    /**
     *
     */
    public function __construct() {
        // Identifier, pick an unique name.
        // Single word, no spaces. Underscores allowed.
        $this->set_type(type: 'column-breadcrumbs_title');

        // Default column label.
        $this->set_label(label: __('Breadcrumbs Title', 'jwws'));
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
        log_error($post_id);
        log_error(get_term($post_id));
        return 'x';
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
}
