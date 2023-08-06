<!-- Groups -->
<?php foreach ($step as $groups) : ?>
    <?php if (is_iterable(value: $groups)) : ?>
        <?php foreach ($groups as $group_key => $group) : ?>
            <div class="accordion-nested JW_ACA--c-card JW_ACA--u-border--top">
                <div class="
                    accordion-header-nested
                    JW_ACA--c-card__header
                    JW_ACA--u-flex--direction-row-reverse
                    JW_ACA--u-flex--justify-content-between
                    JW_ACA--u-size--height-min-20px
                ">
                    <span>
                        <?= ucfirst(string: $group_key); ?>
                    </span>
                </div>
                <div class="JW_ACA--c-card__body--flush">
                    <table class="JW_ACA--c-table JW_ACA--c-table--xs">
                        <?php
                            foreach ($group as $group_item_key => $group_item) {
                                $template = __DIR__ . "/{$group_key}/{$group_item_key}.html.php";

                                if (file_exists(filename: $template)) {
                                    include $template;
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>