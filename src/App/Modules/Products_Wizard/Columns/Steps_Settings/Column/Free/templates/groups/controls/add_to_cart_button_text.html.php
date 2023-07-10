<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- "Add to cart" button text -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the text on the "Add to cart" button of this step.',
            ])
            ->output()
        ;
        ?>
        "Add to cart" button text
    </td>
    <td>
        <samp>
            <?= $group['add_to_cart_button_text'];?>
        </samp>
    </td>
</tr>