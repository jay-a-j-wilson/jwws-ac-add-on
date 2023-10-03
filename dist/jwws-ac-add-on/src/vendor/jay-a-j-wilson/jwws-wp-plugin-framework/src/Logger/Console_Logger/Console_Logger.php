<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Logger\Console_Logger;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Logger;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

// Security::stop_direct_access();

/**
 * Web browser console logger.
 */
final class Console_Logger extends Logger {
    /**
     * Prints to console.
     *
     * @source https://stackify.com/how-to-log-to-console-in-php/
     */
    public static function log(
        mixed $output,
        string $message = '',
    ): mixed {
        echo Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'message', value: $message)
            ->assign(
                key: 'backtrace',
                value: json_encode(
                    value: self::get_backtrace(depth: 1),
                ),
            )
            ->assign(
                key: 'output',
                value: json_encode(
                    value: $output,
                    flags: JSON_HEX_TAG,
                ),
            )
            ->output()
        ;

        return $output;
    }
}
