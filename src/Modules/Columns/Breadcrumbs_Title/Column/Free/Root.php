<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Breadcrumbs_Title\Column\Free;

class Root extends \AC\Column {
    /**
     *
     */
    public function __construct() {
        $this
            ->set_type(type: 'column-breadcrumbs_title')  // Identifier, pick an unique name. Single word, no spaces. Underscores allowed.
            ->set_group(group: 'jwws-wpseo')
            ->set_label(label: __('Breadcrumbs Title', 'jwws')) // Default column label.
        ;
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
        return get_option(option: 'wpseo_taxonomy_meta')['product_cat'][$post_id]['wpseo_bctitle'] ?? '';
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
