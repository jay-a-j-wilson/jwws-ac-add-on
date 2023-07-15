<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Filters -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Filters for the products of the step.',
            ])
            ->output()
        ;
        ?>
        Filters
    </td>
    <td class="JW_ACA--u-padding--all-no">
        <?=
        Template::of(__DIR__ . '/templates/filter.html.php')
            ->assign(
                key: 'filters',
                value: $group['filters']
            )
            ->output()
        ;
        ?>
    </td>
</tr>