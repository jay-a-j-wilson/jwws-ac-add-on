<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Availability rules -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Show/hide the step according the specific rules.',
            ])
            ->output()
        ;
        ?>
        Availability rules
    </td>
    <td class="JW_ACA--u-padding--all-no">
        <?=
        Template::of(__DIR__ . '/templates/availability_rule.html.php')
            ->assign(
                key: 'availability_rules',
                value: $group['availability_rules']
            )
            ->output()
        ;
        ?>
    </td>
</tr>