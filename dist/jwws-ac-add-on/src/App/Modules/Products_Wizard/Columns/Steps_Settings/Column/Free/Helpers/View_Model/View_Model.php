<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\View_Model;

use JWWS\ACA\Deps\JWWS\WPPF\Collection\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class View_Model {
    public static function of(int $wizard_id): self {
        return new self(
            steps_settings: self::sorted_steps_settings(wizard_id: $wizard_id),
        );
    }

    private static function sorted_steps_settings(int $wizard_id): Collection {
        $steps_settings = Post_Meta::of(id: $wizard_id)
            ->find_by_key(key: '_steps_settings')
        ;

        $steps_ids = Post_Meta::of(id: $wizard_id)
            ->find_by_key(key: '_steps_ids')
        ;

        $sorted_steps_settings = [];

        foreach ($steps_ids as $steps_id) {
            if (! isset($steps_settings[(int) $steps_id])) {
                continue;
            }

            $sorted_steps_settings[] = $steps_settings[(int) $steps_id];
        }

        return Standard_Collection::of(...$sorted_steps_settings)
            ->filter_by_value(
                callback: fn (?array $sorted_steps_setting): bool => $sorted_steps_setting !== null,
            )
        ;
    }

    /**
     * @return void
     */
    private function __construct(readonly private Collection $steps_settings) {}

    public function steps_settings(): Collection {
        return $this->steps_settings;
    }

    public function formatted_steps_settings(): Collection {
        return $this->steps_settings
            ->map(callback: fn ($steps_setting): array => [
                'title'  => $steps_setting['title'],
                'groups' => [
                    'basic' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'title',
                                    'nav_title',
                                    'notes',
                                    'thumbnail',
                                    'description',
                                    'bottom_description',
                                    'description_auto_tags',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'query' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'categories',
                                    'attributes',
                                    'included_products',
                                    'excluded_products',
                                    'exclude_added_products_of_steps',
                                    'availability_rules',
                                    'order',
                                    'order_by',
                                    'enable_order_by_dropdown',
                                    'products_per_page',
                                    'products_per_page_items',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'cart' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'several_products',
                                    'several_variations_per_product',
                                    'hide_choose_element',
                                    'dont_add_to_cart',
                                    'dont_add_to_cart_products',
                                    'selected_items_by_default',
                                    'all_selected_items_by_default',
                                    'no_selected_items_by_default',
                                    'sold_individually',
                                    'add_to_cart_by_quantity',
                                    'product_quantity_by_default',
                                    'min_product_quantity',
                                    'max_product_quantity',
                                    'min_products_selected',
                                    'max_products_selected',
                                    'min_total_products_quantity',
                                    'max_total_products_quantity',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'controls' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'buttons_nonblocking_requests',
                                    'enable_add_to_cart_button',
                                    'add_to_cart_behavior',
                                    'add_to_cart_button_text',
                                    'add_to_cart_button_class',
                                    'enable_update_button',
                                    'update_button_text',
                                    'update_button_class',
                                    'enable_remove_button',
                                    'remove_button_text',
                                    'remove_button_class',
                                    'hide_remove_button',
                                    'hide_edit_button',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'view' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'template',
                                    'grid_column',
                                    'grid_with_sidebar_column',
                                    'item_template',
                                    'variations_type',
                                    'show_thumbnails',
                                    'thumbnail_size',
                                    'enable_thumbnail_link',
                                    'merge_thumbnail_with_gallery',
                                    'show_galleries',
                                    'gallery_column',
                                    'show_descriptions',
                                    'item_description_source',
                                    'enable_title_link',
                                    'show_attributes',
                                    'show_availabilities',
                                    'show_sku',
                                    'show_tags',
                                    'show_prices',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'filters' => Standard_Collection::of(...$steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Standard_Collection::of(
                                ...[
                                    'use_step_filters',
                                    'filters',
                                    'apply_default_filters',
                                    'filter_position',
                                    'filter_is_expanded',
                                    'filter_thumbnail_size',
                                ],
                            )
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                ],
            ])
        ;
    }
}
