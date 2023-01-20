<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Breadcrumbs_Title\Column\Pro;

use ACP;
use JWWS\Admin_Columns_Add_On\Modules\Breadcrumbs_Title;

// In this example we extend the free version, but if you only want a pro version, there is no need to write a separate free column
class Root extends Breadcrumbs_Title\Column\Free\Root implements
    ACP\Editing\Editable,
    ACP\Sorting\Sortable,
    ACP\Filtering\Filterable,
    ACP\Export\Exportable,
    ACP\Search\Searchable {
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
            $list_screen->register_column_type(column: new self());
        }
    }

    /**
     *
     */
    public function editing() {
        return new Breadcrumbs_Title\Editing\Root($this);
    }

    /**
     *
     */
    public function sorting() {
        // Example #1 - Sort any value
        return new Breadcrumbs_Title\Sorting\Root($this);
        // The following examples are recommended for large datasets. They are optimised queries and much faster.

        // Example #2 - Sorting by custom field values on the posts table
        // return new \ACP\Sorting\Model\Post\Meta( 'my_custom_meta_key' );

        // Example #3 - Sorting by numeric custom field values on the users table
        // return new \ACP\Sorting\Model\User\Meta( 'my_custom_meta_key', new \ACP\Sorting\Type\DataType( 'numeric' ) );

        // Example #4 - Sorting by custom field values on the posts table with custom formatting applied.
        // In this example we want to sort by the Post `Title`, not the Post `ID` that is stored within the custom field.
        // We will convert each Post `ID` to a Post `Title` before we apply sorting.
        // return new \ACP\Sorting\Model\Post\MetaFormat( new \ACP\Sorting\FormatValue\PostTitle(), 'my_custom_meta_key' );

        // Within this directory you will find all available sorting models: `admin-columns-pro/classes/Sorting/Model`.
    }

    /**
     *
     */
    public function export() {
        return new Breadcrumbs_Title\Export\Root($this);
    }

    /**
     *
     */
    public function filtering() {
        return new Breadcrumbs_Title\Filtering\Root($this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Breadcrumbs_Title\Smart_Filtering\Root();
    }
}
