<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Enable "Update" button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Shows the Edit button in the wizard.',
            ])
            ->output()
        ;
        ?>
        Enable "Update" button
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_update_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>