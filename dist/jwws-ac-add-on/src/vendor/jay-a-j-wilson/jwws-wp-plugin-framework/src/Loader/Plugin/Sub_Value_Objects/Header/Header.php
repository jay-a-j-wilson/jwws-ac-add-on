<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use JWWS\ACA\Deps\JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums\Type;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents the plugin's header value object.
 */
abstract class Header extends Base_Value_Object {
    /**
     * Returns the header type.
     */
    abstract protected static function type(): Type;

    /**
     * @param string $basename the plugin's basename
     */
    final public static function of(string $basename): static {
        return new static(
            value: self::header(
                path: Filepath::of(basename: $basename)->__toString(),
            ),
        );
    }

    /**
     * Returns the plugin header.
     */
    private static function header(string $path): string {
        return self::plugin_data(
            path: Confirmed_Filepath::of(
                dir: Full_Dir::of(path: $path),
                file: PHP_File::of(path: $path),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function plugin_data(Confirmed_Filepath $path): string {
        self::ensure_get_plugin_data_func_is_available();

        // https://developer.wordpress.org/reference/functions/get_plugin_data/
        return get_plugin_data(
            plugin_file: $path->value,
        )[static::type()->value];
    }

    /**
     * Ensures function get_plugin_data() is available.
     * get_plugin_data() is NOT available by default (not even in admin).
     */
    private static function ensure_get_plugin_data_func_is_available(): void {
        if (! function_exists(function: 'get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
    }
}
