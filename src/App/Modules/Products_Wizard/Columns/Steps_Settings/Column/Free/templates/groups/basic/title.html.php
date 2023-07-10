<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Title -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the title of the step.'
            ])
            ->output()
        ;
        ?>
        Title
    </td>
    <td>
        <samp><?= $group['title']; ?></samp>
    </td>
</tr>