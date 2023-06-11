<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns\Categories_Hierarchy\Column\Pro;

use JWWS\ACA\Modules\WooCommerce\Columns\Categories_Hierarchy\{
    Column,
    Editing,
    Export,
    Sorting,
    Smart_Filtering,
    Filtering
};
use ACP\{
    ConditionalFormat\ConditionalFormatTrait,
    ConditionalFormat\Formattable,
    Editing\Editable,
    Export\Exportable,
    Sorting\Sortable,
    Search\Searchable,
    Filtering\Filterable,
};

// In this example we extend the free version, but if you only want a pro version, there is no need to write a separate free column
class Root extends Column\Free\Root implements
    Formattable,
    Editable,
    Exportable,
    Sortable,
    Searchable,
    Filterable {
    use ConditionalFormatTrait;

    /**
     *
     */
    public function editing() {
        return new Editing\Root($this);
    }

    /**
     *
     */
    public function export() {
        return new Export\Root($this);
    }

    /**
     *
     */
    public function sorting() {
        // Example #1 - Sort any value
        return new Sorting\Root($this);
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
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Smart_Filtering\Root();
    }

    /**
     *
     */
    public function filtering() {
        return new Filtering\Root($this);
    }
}
