<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!-- Add to cart by quantity -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'When this option is set, then all products having a quantity
                more than zero are added to the cart. When this option is
                selected the product selection icon is hidden. The products\'
                quantity is still visible.',
                'The «Sold individually» setting shouldn\'t be enabled if this
                option is checked.'
            ])
            ->output()
        ;
        ?>
        Add to cart by quantity
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['add_to_cart_by_quantity'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>