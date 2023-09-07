<?php declare(strict_types=1);

define('WP_DEBUG', false);

// WARNING WARNING WARNING!
// tests DROPS ALL TABLES in the database. DO NOT use a production database

define('DB_NAME', 'wp_localwordpresstest_db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$table_prefix = 'wptests_'; // Only numbers, letters, and underscores please!

define('WP_TESTS_DOMAIN', 'localhost');
define('WP_TESTS_EMAIL', 'admin@example.org');
define('WP_TESTS_TITLE', 'Test Blog');

define('WP_PHP_BINARY', 'php');

define('WPLANG', '');

// change the next line to points to your wordpress dir
define('ABSPATH', '/Users/jaywilson/Sites/WordPress/local.wordpress.test/');
// CREATE A SYMBOLIC LINK OF jwws-ac-add-on FOLDER AND PLACE IT IN THE
// WORDPRESS PLUGIN DIRECTORY.

// WooCommerce
define('WC_ABSPATH', ABSPATH . '/wp-content/plugins/woocommerce/');

$dependencies = [
    // Admin Columns Pro
    'admin-columns-pro/admin-columns/classes/Column.php',
    'admin-columns-pro/admin-columns/classes/ArrayIterator.php',
    'admin-columns-pro/admin-columns/classes/Config.php',

    'admin-columns-pro/classes/ConditionalFormat/ConditionalFormatTrait.php',

    'admin-columns-pro/classes/Editing/Editable.php',
    'admin-columns-pro/classes/Editing/Service.php',

    'admin-columns-pro/classes/Export/Exportable.php',
    'admin-columns-pro/classes/Export/Model.php',

    'admin-columns-pro/classes/Filtering/Filterable.php',
    'admin-columns-pro/classes/Filtering/Model.php',

    'admin-columns-pro/classes/ConditionalFormat/Formattable.php',

    'admin-columns-pro/classes/Search/Searchable.php',
    'admin-columns-pro/classes/Search/Comparison.php',
    'admin-columns-pro/classes/Search/Operators.php',
    'admin-columns-pro/classes/Search/Value.php',
    'admin-columns-pro/classes/Search/Labels.php',

    'admin-columns-pro/classes/Sorting/Sortable.php',
    'admin-columns-pro/classes/Sorting/AbstractModel.php',
    'admin-columns-pro/classes/Sorting/Type/DataType.php',

    // WooCommerce
    'woocommerce/includes/abstracts/abstract-wc-data.php',
    'woocommerce/includes/abstracts/abstract-wc-product.php',
    'woocommerce/includes/class-wc-data-store.php'
];

foreach ($dependencies as $dependency) {
    require ABSPATH . 'wp-content/plugins/' . $dependency;
}
