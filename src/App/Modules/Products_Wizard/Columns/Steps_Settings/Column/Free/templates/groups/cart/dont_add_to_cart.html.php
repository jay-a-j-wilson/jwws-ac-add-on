<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Don't add to main cart -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Does not allow any product of this step to be to the car.',
            ])
            ->output()
        ;
        ?>
        Don't add to main cart
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['dont_add_to_cart'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
