<?php

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Categories for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            The categories of the products you want to present in this step.
        </div>
        Categories for using
    </td>
    <td>
        <?php foreach ($group['categories'] as $category_id) : ?>
            <samp>
                <?=
                    Term_Repo::create()
                        ->find_by_id(id: $category_id)
                        ->name
                    ;
                ?>
                [#<?= $category_id; ?>]
            </samp>
            <br>
        <?php endforeach; ?>
    </td>
</tr>
<!-- Attributes for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Product attribute values to fetch products
        </div>
        Attributes for using
    </td>
    <td>
        <?php if (! empty($group['attributes'])) : ?>
            <?php foreach ($group['attributes'] as $attribute) : ?>
                <?php
                    $attr_pair = explode(
                    separator: '#',
                    string: $attribute,
                );
                ?>
                <samp>
                    <?= wc_attribute_label(name: $attr_pair[0]); ?>
                    [#<?= $attr_pair[1]; ?>]
                </samp>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Availability rules -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Show/hide the step according the specific rules
        </div>
        Availability rules
    </td>
    <td class="JW_ACA--u-padding--all-no">
        <?php foreach ($group['availability_rules'] as $key => $availability_rule) : ?>
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
                        Rule <?= ucfirst(string: $key + 1); ?>
                    </span>
                </div>
                <div class="JW_ACA--c-card__body">
                    <table class="JW_ACA--c-table JW_ACA--c-table--xs">
                        <tr>
                            <td>Source</td>
                            <td>
                                <samp>
                                    <?= $availability_rule['source']; ?>
                                </samp>
                            </td>
                        </tr>
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
                        <tr>
                            <td>Condition</td>
                            <td>
                                <samp>
                                    <?= $availability_rule['condition']; ?>
                                </samp>
                            </td>
                        </tr>
                        <tr>
                            <td>Relation within the items</td>
                            <td>
                                <samp>
                                    <?= $availability_rule['inner_relation']; ?>
                                </samp>
                            </td>
                        </tr>
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
    </td>
</tr>
<!----------------------------------------------------------------------------->
<!-- Order -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Order
    </td>
    <td>
        <samp><?= $group['order']; ?></samp>
    </td>
</tr>
<!-- Order by -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Order by
    </td>
    <td>
        <samp><?= $group['order_by']; ?></samp>
    </td>
</tr>
<!-- Enable "Order by" dropdown -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Shows the typical WooCommerce dropdown menu for the products' order.
        </div>
        Enable "Order by" dropdown
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_order_by_dropdown'])
                ->to_html()
            ;
            ?>
        </samp>
    </td>
</tr>
<!-- Products per page -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span title="tooltip" class="JW_ACA--u-font--size-md JW_ACA--u-size--13px dashicons dashicons-info"></span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Sets the quantity of the products per page. Zero is equal infinity.
        </div>
        Products per page
    </td>
    <td>
        <samp><?= $group['products_per_page']; ?></samp>
    </td>
</tr>