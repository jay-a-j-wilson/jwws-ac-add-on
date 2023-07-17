<span
    title="tooltip"
    class="
        JW_ACA--u-font--size-md
        JW_ACA--u-size--13px
        dashicons
        dashicons-info
    "
></span>
<div role="tooltip" class="JW_ACA--c-tooltip">
    <?php if (is_iterable(value: $paragraphs)) : ?>
        <?php foreach($paragraphs as $paragraph) : ?>
            <p class="JW_ACA--u-text--align-left">
                <?= $paragraph; ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>