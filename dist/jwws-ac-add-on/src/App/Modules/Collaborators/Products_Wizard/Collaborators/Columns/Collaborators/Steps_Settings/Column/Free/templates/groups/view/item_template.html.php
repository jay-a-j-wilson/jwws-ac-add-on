<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Product template -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Changes the view of the products in the current step. Doesn\'t
                matter for the \'Table\' template.',
            ])
            ->output()
        ;
        ?>
        Product template
    </td>
    <td>
        <samp><?= $group['item_template']; ?></samp>
    </td>
</tr>