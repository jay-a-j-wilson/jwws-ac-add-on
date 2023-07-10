<?php

use JWWS\ACA\Deps\JWWS\WPPF\{
    Template\Template,
    WordPress\Repo\Subclasses\Term_Repo\Term_Repo
};
?>

<!-- Categories for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'The categories of the products you want to present in this
                step.',
            ])
            ->output()
        ;
        ?>
        Categories for using
    </td>
    <td>
        <?php foreach ($group['categories'] as $category_id) : ?>
            <samp>
                <?=
                    Term_Repo::new_instance()
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