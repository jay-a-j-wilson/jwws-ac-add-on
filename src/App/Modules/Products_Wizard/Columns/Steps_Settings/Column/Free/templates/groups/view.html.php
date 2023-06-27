<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Template -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span 
            title="tooltip" 
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Defines the layout of the products of the current step. There are
            several options there: list, table, masonry, grid.
        </div>
        Template
    </td>
    <td>
        <samp><?= $group['template']; ?></samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Product template -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span 
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Changes the view of the products in the current step. Doesn't matter
            for the 'Table' template.
        </div>
        Product template
    </td>
    <td>
        <samp><?= $group['item_template']; ?></samp>
    </td>
</tr>
<!-- Product variation template -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Product variation template
    </td>
    <td>
        <samp><?= $group['variations_type']; ?></samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Show product thumbnails -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Show product thumbnails
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_thumbnails'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Thumbnail size -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Thumbnail size
    </td>
    <td>
        <samp><?= $group['thumbnail_size']; ?></samp>
    </td>
</tr>
<!-- Enable thumbnail link -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Enable thumbnail link
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_thumbnail_link'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Merge thumbnail with gallery -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"
        ></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Removes the galleries from the products and shows only the gallery
            images in thumbnails, formatted as a carousel.
        </div>
        Merge thumbnail with gallery
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['merge_thumbnail_with_gallery'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Show product gallery -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Show product gallery
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_galleries'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Show product description -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Show product description
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_descriptions'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Description source -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Description source
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['item_description_source'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Enable product title link -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Enable product title link
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_title_link'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Show product attributes -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product attributes
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_attributes'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Show product availabilities -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product availabilities
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_availabilities'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Show product SKU -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product SKU
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_sku'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Show product tags -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product tags
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_tags'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
<!-- Show product price -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product price
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_prices'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
