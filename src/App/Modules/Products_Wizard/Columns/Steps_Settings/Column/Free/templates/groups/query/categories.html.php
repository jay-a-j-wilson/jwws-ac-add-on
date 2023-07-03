<?php

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;
?>

<!-- Categories for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
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