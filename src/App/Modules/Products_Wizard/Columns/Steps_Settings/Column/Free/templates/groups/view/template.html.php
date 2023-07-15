<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Template -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the layout of the products of the current step. There
                are several options there: list, table, masonry, grid.',
            ])
            ->output()
        ;
        ?>
        Template
    </td>
    <td>
        <samp><?= $group['template']; ?></samp>
    </td>
</tr>