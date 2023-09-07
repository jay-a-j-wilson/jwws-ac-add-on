<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Common\Utility;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

final class Variable {
    /**
     * Do not instantiate.
     */
    private function __construct() {}

    /**
     * @return string|false|void
     */
    public static function var_dump_r(
        mixed $value,
        bool $return = false,
    ): string|bool {
        ob_start();
        var_dump(value: $value);
        $contents = ob_get_clean();

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @return string|string[]|null|void
     */
    public static function pretty_var_dump_r(
        mixed $value,
        bool $return = false,
    ) {
        $contents = preg_replace(
            pattern: "/{\n\\s*}/m",
            replacement: '{}',
            subject: preg_replace(
                pattern: "/=>\n[ ]+/m",
                replacement: ' => ',
                subject: self::var_dump_r(
                    value: $value,
                    return: true,
                ),
            ),
        );

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @return string|false|void
     */
    public static function var_export_r(
        mixed $value,
        bool $return = false,
    ): string|bool {
        ob_start();
        var_export(value: $value);
        $contents = ob_get_clean();

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @return string|string[]|null|void
     */
    public static function pretty_var_export_r(
        mixed $value,
        bool $return = false,
    ) {
        $contents = preg_replace(
            pattern: "/=>\n[ ]+/m",
            replacement: ' => ',
            subject: self::var_export_r(
                value: $value,
                return: true,
            ),
        );

        if ($return) {
            return $contents;
        }

        echo $contents;
    }
}
