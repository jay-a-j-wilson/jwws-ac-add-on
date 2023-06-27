<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Can select several products -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Hides the radio/checkbox icon on each product. If you enable this
            option, then the only way to select a product is the use of the
            individual controls of each product.
        </div>
        Can select several products
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['several_products'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Hide choose element -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Use with individual product controls or 'Add to cart by quantity'
            setting.
        </div>
        Hide choose element
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['hide_choose_element'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Selected items by default -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                Define the products that are selected by default when entering
                this step. Also by this option you can define specific product
                variations as checked.
            </p>
            <p class="JW_ACA--u-text--align-left">
                Hides the radio/checkbox icon on each product. If you enable
                this option, then the only way to select a product is the use of
                the individual controls of each product.
            </p>
        </div>
        Selected items by default
    </td>
    <td>
        <?php if (! empty($group['selected_items_by_default'])) : ?>
            <?php foreach ($group['selected_items_by_default'] as $item_id) : ?>
                <?php $default_product = wc_get_product(the_product: $item_id); ?>
                <samp>
                    <?=
                    wp_get_attachment_image(
                        attachment_id: $default_product->get_image_id(),
                        icon: true,
                        attr: ['class' => 'JW_ACA--c-image--12px'],
                    );
                    ?>
                    <?= $default_product->get_title(); ?>
                    [#<?= $item_id; ?>]
                </samp>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
    </td>
</tr>
<!-- No selected items by default -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        No selected items by default
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['no_selected_items_by_default'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Sold individually -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Shows/hides the quantity setting input of a product.
        </div>
        Sold individually
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['sold_individually'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
