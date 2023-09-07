<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta;

use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Enums\Type;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Meta;

// Security::stop_direct_access();

final class Term_Meta extends Meta {
    protected static function meta_type(): Type {
        return Type::TERM;
    }
}
