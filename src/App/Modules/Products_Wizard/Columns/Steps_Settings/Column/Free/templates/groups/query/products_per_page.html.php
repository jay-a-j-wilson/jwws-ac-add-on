<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Products per page -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Sets the quantity of the products per page. Zero is equal
                infinity.',
            ])
            ->output()
        ;
        ?>
        Products per page
    </td>
    <td>
        <samp><?= $group['products_per_page']; ?></samp>
    </td>
</tr>