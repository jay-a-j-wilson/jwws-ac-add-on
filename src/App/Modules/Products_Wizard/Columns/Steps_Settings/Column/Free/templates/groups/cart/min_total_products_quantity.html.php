<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Minimum total products quantity -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Sets the minimum product quantity input value for this step.',
                'This option works without the «Sold individually» option.',
            ])
            ->output()
        ;
        ?>
        Minimum total products quantity
    </td>
    <td>
        <?=
        Template::of(path: __DIR__ . '/templates/validation.html.php')
            ->assign(key: 'setting', value: $group['min_total_products_quantity'])
            ->output();
        ?>
    </td>
</tr>
