<!----------------------------------------------------------------------------->
<!-- Top description -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
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
        <?php if(! empty($group['description'])) : ?>
            <code>
                <samp>
                    <?= htmlspecialchars(string: $group['description']); ?>
                </samp>
            </code>
        <?php endif; ?>
    </td>
</tr>