<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Enable "Remove" button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Shows the Remove button',
            ])
            ->output()
        ;
        ?>
        Enable "Remove" button
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_remove_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>