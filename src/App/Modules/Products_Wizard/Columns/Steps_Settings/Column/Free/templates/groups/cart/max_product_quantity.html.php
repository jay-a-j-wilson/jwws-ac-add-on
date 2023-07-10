<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Maximum product quantity -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Sets the maximum product quantity input value for this step.',
                'This option works without the «Sold individually» option.'
            ])
            ->output()
        ;
        ?>
        Maximum product quantity
    </td>
    <td>
        <?=
        Template::of(path: __DIR__ . '/templates/validation.html.php')
            ->assign(key: 'setting', value: $group['max_product_quantity'])
            ->output();
        ?>
    </td>
</tr>
