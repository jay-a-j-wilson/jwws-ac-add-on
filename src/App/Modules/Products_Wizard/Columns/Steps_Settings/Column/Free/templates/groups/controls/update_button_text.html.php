<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- "Update" button text -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the label of the Update button.',
            ])
            ->output()
        ;
        ?>
        "Update" button text
    </td>
    <td>
        <samp>
            <?= $group['update_button_text'];?>
        </samp>
    </td>
</tr>