<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Profit;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

trait Profits {
    private function set_profit(): void {
        $this->profit = Profit::of(
            price: Price::of(num: (float) $this->get_price()),
            cost: Cost::of(num: (float) $this->cost()),
        );
    }

    public function cost(): string {
        return Post_Meta::of(id: $this->get_id())
            ->find_by_key(key: 'yith_cog_cost')
        ;
    }

    public function profit_amount(): string {
        return $this->format(num: $this->profit->amount());
    }

    public function profit_amount_with_sign(): string {
        return $this->profit_amount() === '' ? '' : wc_price(price: $this->profit_amount());
    }

    public function profit_margin(): string {
        return $this->format(num: $this->profit->margin());
    }

    public function profit_margin_with_sign(): string {
        return $this->profit_margin() === '' ? '' : $this->profit_margin() . '%';
    }

    public function profit_markup(): string {
        return $this->format(num: $this->profit->markup());
    }

    public function profit_markup_with_sign(): string {
        return $this->profit_markup() === '' ? '' : $this->profit_markup() . '%';
    }

    private function format(float $num): string {
        return $this->cost() === ''
            ? ''
            : number_format(
                num: $num,
                decimals: 2,
                thousands_separator: '',
            );
    }
}
