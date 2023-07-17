<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Maximum products selected -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Indicates the number of products that must be selected in this
                step so that the customer will be able to move to the next one.'
            ])
            ->output()
        ;
        ?>
        Maximum products selected
    </td>
    <td>
        <?=
        Template::of(path: __DIR__ . '/templates/validation.html.php')
            ->assign(key: 'setting', value: $group['max_products_selected'])
            ->output();
        ?>
    </td>
</tr>
