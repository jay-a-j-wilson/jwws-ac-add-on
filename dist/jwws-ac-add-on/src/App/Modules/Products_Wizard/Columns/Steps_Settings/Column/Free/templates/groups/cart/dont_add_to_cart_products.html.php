<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Don't add specific products to cart -->
<tr">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Excludes the products you specify from the cart.',
                'The products will be visible in the wizard but they could not
                be added to the cart.'
            ])
            ->output()
        ;
        ?>
        Don't add specific products to cart
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['dont_add_to_cart_products'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
