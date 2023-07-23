<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<?php foreach ($filters as $key => $filter) : ?>
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
                Filter #<?= $key + 1; ?> <?= $filter['label']; ?>
            </span>
        </div>
        <div class="JW_ACA--c-card__body--flush">
            <table class="JW_ACA--c-table JW_ACA--c-table--xs">
                <tr>

                <!-- Source -->
                <tr>
                    <td>Source</td>
                    <td>
                        <samp>
                            <?= $filter['source']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- View -->
                <tr>
                    <td>View</td>
                    <td>
                        <samp>
                            <?= $filter['view']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Label -->
                <tr>
                    <td>Label</td>
                    <td>
                        <samp>
                            <?= $filter['label']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Order -->
                <tr>
                    <td>Order</td>
                    <td>
                        <samp>
                            <?= $filter['order']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Order by -->
                <tr>
                    <td>Order by</td>
                    <td>
                        <samp>
                            <?= $filter['order_by']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Include terms -->
                <tr>
                    <td>Include terms</td>
                    <td>
                        <samp>
                            <?= $filter['include']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Exclude terms -->
                <tr>
                    <td>Exclude terms</td>
                    <td>
                        <samp>
                            <?= $filter['exclude']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Default -->
                <tr>
                    <td>Default</td>
                    <td>
                        <samp>
                            <?= $filter['default']; ?>
                        </samp>
                    </td>
                </tr>

                <!-- Add empty value -->
                <tr>
                    <td>Add empty value</td>
                    <td>
                        <samp>
                            <?=
                            Boolean::from(value: $filter['add_empty_value'])
                                ->to_html();
                            ?>
                        </samp>
                    </td>
                </tr>

            </table>
        </div>
    </div>
<?php endforeach; ?>