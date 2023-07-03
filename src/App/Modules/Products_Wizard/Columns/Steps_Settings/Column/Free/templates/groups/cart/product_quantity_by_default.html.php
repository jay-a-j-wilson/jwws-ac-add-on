<!-- Default product quantity -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                Sets the initial products' quantity for this step. This option
                works with the «Sold individually» option. 
            </p>
            <p class="JW_ACA--u-text--align-left">
                When the customer enters this step, and the «Sold individually»
                option is enabled, the product quantity defined here will be set
                to each product of the step.
            </p>
        </div>
        Default product quantity
    </td>
    <td>
        <samp>
            <?= $group['product_quantity_by_default']; ?>
        </samp>
    </td>
</tr>
