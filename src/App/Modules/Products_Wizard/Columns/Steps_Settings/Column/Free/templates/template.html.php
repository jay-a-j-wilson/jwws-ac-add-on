<div class="JW_ACA--l-container JW_ACA--u-gap--row-xs">

    <!-- Steps -->
    <?php foreach ($steps as $step_key => $step) : ?>
        <div class="accordion JW_ACA--c-card">
            <div class="
                accordion-header
                JW_ACA--c-card__header
                JW_ACA--u-flex--direction-row-reverse
                JW_ACA--u-flex--justify-content-between
            ">
                <span class=JW_ACA--c-card__title>
                    #<?= $step_key + 1; ?> <?= $step['title']; ?>
                </span>
            </div>
            <div class="JW_ACA--c-card__body JW_ACA--u-padding--all-no">
                <div class="JW_ACA--l-container JW_ACA--u-gap--row-no">
                    <?php include __DIR__ . "/groups/group.html.php"; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>