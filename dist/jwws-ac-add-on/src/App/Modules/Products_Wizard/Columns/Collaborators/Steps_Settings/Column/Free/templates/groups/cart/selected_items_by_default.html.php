<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Selected items by default -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Define the products that are selected by default when entering
                this step. Also by this option you can define specific product
                variations as checked.',
                'Hides the radio/checkbox icon on each product. If you enable
                this option, then the only way to select a product is the use of
                the individual controls of each product.'
            ])
            ->output()
        ;
        ?>
        Selected items by default
    </td>
    <td>
        <?=
        Template::of(__DIR__ . '/templates/selected_items_by_default.html.php')
            ->assign(
                key: 'selected_items_by_default',
                value: $group['selected_items_by_default'])
            ->output()
        ;
        ?>
    </td>
</tr>