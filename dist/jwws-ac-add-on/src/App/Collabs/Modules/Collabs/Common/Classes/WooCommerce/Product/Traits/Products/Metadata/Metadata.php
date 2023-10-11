<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Metadata;

trait Metadata {
    public function delete_metadata(string $key): void {
        $this->delete_meta_data(key: $key);
        $this->save();
    }

    public function update_metadata(string $key, mixed $value): void {
        $this->update_meta_data(
            key: $key,
            value: $value,
        );
        $this->save();
    }
}
