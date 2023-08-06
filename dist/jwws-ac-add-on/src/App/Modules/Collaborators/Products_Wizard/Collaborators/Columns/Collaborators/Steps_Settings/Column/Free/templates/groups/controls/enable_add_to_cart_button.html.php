<?php

use JWWS\ACA\App\Modules\{
    Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!----------------------------------------------------------------------------->
<!-- Enable "Add to cart" button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Enables/disables the "Add to cart" button on each product of
                this step.',
            ])
            ->output()
        ;
        ?>
        Enable "Add to cart" button
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_add_to_cart_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>