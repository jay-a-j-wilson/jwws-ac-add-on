<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- "Remove" button text -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the label of the Remove button.',
            ])
            ->output()
        ;
        ?>
        "Remove" button text
    </td>
    <td>
        <samp>
            <?= $group['remove_button_text'];?>
        </samp>
    </td>
</tr>