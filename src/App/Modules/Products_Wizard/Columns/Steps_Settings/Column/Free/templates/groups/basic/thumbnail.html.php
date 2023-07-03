<!-- Thumbnail -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
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