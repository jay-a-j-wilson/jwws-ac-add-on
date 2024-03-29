<?php foreach ($availability_rules as $key => $availability_rule) : ?>
    <div class="
        accordion-nested
        JW_ACA--c-card
        JW_ACA--u-border--remove-right
        JW_ACA--u-border--remove-bottom
    ">
        <div class="
            accordion-header-nested
            JW_ACA--c-card__header
            JW_ACA--u-flex--direction-row-reverse
            JW_ACA--u-flex--justify-content-between
        ">
            <span>
                Rule #<?= $key + 1; ?>
            </span>
        </div>
        <div class="JW_ACA--c-card__body--flush">
            <table class="JW_ACA--c-table JW_ACA--c-table--xs">

                <!-- Source -->
                <tr>
                    <td>Source</td>
                    <td>
                        <samp>
                            <?= $availability_rule['source']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Product -->
                <?php if ($availability_rule['source'] === 'product'): ?>
                    <tr>
                        <td>Product</td>
                        <td>
                            <?php if (! empty($availability_rule['product'])): ?>
                                <samp>
                                    <?=
                                    implode(
                                        separator: ',',
                                        array: $availability_rule['product'],
                                    );
                                    ?>
                                </samp>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Category -->
                <?php if ($availability_rule['source'] === 'category'): ?>
                    <tr>
                        <td>Category</td>
                        <td>
                            <samp>
                                <?= $availability_rule['category']; ?>
                            </samp>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Attribute -->
                <?php if ($availability_rule['source'] === 'attribute'): ?>
                    <tr>
                        <td>Attribute</td>
                        <td>
                            <samp>
                                <?= $availability_rule['attribute']; ?>
                            </samp>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Custom field -->
                <?php if ($availability_rule['source'] === 'custom_field'): ?>
                    <tr>
                        <td>Custom field name</td>
                        <td>
                            <samp>
                                <?= $availability_rule['custom_field_name']; ?>
                            </samp>
                        </td>
                    </tr>
                    <tr>
                        <td>Custom field value</td>
                        <td>
                            <samp>
                                <?= $availability_rule['custom_field_value']; ?>
                            </samp>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Condition-->
                <tr>
                    <td>Condition</td>
                    <td>
                        <samp>
                            <?= $availability_rule['condition']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Relation within the items -->
                <?php if ($availability_rule['source'] !== 'custom_field'): ?>
                    <tr>
                        <td>Relation within the items</td>
                        <td>
                            <samp>
                                <?= $availability_rule['inner_relation']; ?>
                            </samp>
                        </td>
                    </tr>
                <?php endif; ?>

                <!-- Relation with the next rule -->
                <tr>
                    <td>Relation with the next rule</td>
                    <td>
                        <samp>
                            <?= $availability_rule['outer_relation']; ?>
                        </samp>
                    </td>
                </tr>

            </table>
        </div>
    </div>
<?php endforeach; ?>