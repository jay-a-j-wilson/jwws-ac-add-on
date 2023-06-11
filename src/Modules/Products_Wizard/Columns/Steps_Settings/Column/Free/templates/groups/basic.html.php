<?php

use JWWS\ACA\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean
};
?>

<!-- Title -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Defines the title of the step.
        </div>
        Title
    </td>
    <td>
        <samp><?= $group['title']; ?></samp>
    </td>
</tr>
<!-- Thumbnail -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                Defines a thumbnail which is shown in the navigation tab of the
                step.
            </p>
            <p class="JW_ACA--u-text--align-left">
                This works only with the Step-by-Step behavior.
            </p>
        </div>
        Thumbnail
    </td>
    <td>
        <?=
        wp_get_attachment_image(
            attachment_id: $group['thumbnail'],
            icon: true,
            attr: ['class' => 'JW_ACA--c-image--12px'],
        );
        ?>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Top description -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                Area you can add a text for your customers before the products'
                area of this step.
            </p>
            <p class="JW_ACA--u-text--align-left">
                In the description area you can also add custom fields to
                collect extra data from your customers using the special
                shortcode, as
                <code>
                    [wcpw-step-input name="My custom filed"]
                </code>.
            </p>
        </div>
        Top description
    </td>
    <td>
        <code>
            <samp>
                <?= htmlspecialchars(string: $group['description']); ?>
            </samp>
        </code>
    </td>
</tr>
<!-- Handle description with auto tags -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Preserves the HTML-tags in the text and shows the text
            HTML-formatted.
        </div>
        Handle description with auto tags
    </td>
    <td>
        <samp>
            <?=
            Boolean\Root::from(value: $group['description_auto_tags'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>