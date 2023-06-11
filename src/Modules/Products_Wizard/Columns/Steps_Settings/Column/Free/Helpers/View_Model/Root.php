<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\View_Model;

use JWWS\WPPF\Collection\Collection;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * @package JWWS\ACA
 */
class Root {
    /**
     * @param int $wizard_id
     *
     * @return self
     */
    public static function of(int $wizard_id): self {
        return new self(
            get_post_meta(
                post_id: $wizard_id,
                key: '_steps_settings',
            )[0],
        );
    }

    /**
     * @param array $steps_settings
     *
     * @return void
     */
    private function __construct(private array $steps_settings) {
    }

    /**
     * @param mixed $wizard_id
     *
     * @return array
     */
    public function get_steps_settings(): array {
        return $this->steps_settings;
    }

    /**
     * @return Collection
     */
    public function get_formatted_steps_settings(): Collection {
        return Collection::of(items: $this->steps_settings)
            ->map(callback: fn ($steps_setting): array => [
                'title'  => $steps_setting['title'],
                'groups' => [
                    'basic' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
                                'title',
                                'nav_title',
                                'notes',
                                'thumbnail',
                                'description',
                                'bottom_description',
                                'description_auto_tags',
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'query' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
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
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'cart' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
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
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'controls' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
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
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'view' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
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
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                    'filters' => Collection::of(items: $steps_setting)
                        ->filter_by_key(
                            callback: fn ($step_setting): bool => Collection::of(items: [
                                'use_step_filters',
                                'filters',
                                'apply_default_filters',
                                'filter_position',
                                'filter_is_expanded',
                                'filter_thumbnail_size',
                            ])
                                ->contains_value(value: $step_setting),
                        )
                        ->to_array(),
                ],
            ])
        ;
    }
}
