<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Minimum total products quantity -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                Sets the minimum product quantity input value for this step.
            </p>
            <p class="JW_ACA--u-text--align-left">
                This option works without the «Sold individually» option.
            </p>
        </div>
        Minimum total products quantity
    </td>
    <td>
        <?=
        Template::of(path: __DIR__ . '/templates/validation.html.php')
            ->assign(key: 'setting', value: $group['min_total_products_quantity'])
            ->output();
        ?>
    </td>
</tr>
