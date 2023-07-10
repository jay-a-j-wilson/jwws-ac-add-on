<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Default product quantity -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Sets the initial products\' quantity for this step. This option
                works with the «Sold individually» option.',
                'When the customer enters this step, and the «Sold individually»
                option is enabled, the product quantity defined here will be set
                to each product of the step.'
            ])
            ->output()
        ;
        ?>
        Default product quantity
    </td>
    <td>
        <samp>
            <?= $group['product_quantity_by_default']; ?>
        </samp>
    </td>
</tr>
