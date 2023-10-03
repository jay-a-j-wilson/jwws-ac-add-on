<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Utility\Variable;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Logger;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\WPPF\Traits\Variable_Handler;

// Security::stop_direct_access();

final class Error_Logger extends Logger {
    /**
     * Prints to error log.
     */
    public static function log(mixed $output, int $depth = 1): mixed {
        error_log(message: self::generate_message(
            contents: print_r(
                value: self::get_backtrace(depth: $depth)['args'][0],
                return: true,
            ),
            depth: $depth,
        ));

        return $output;
    }

    /**
     * Prints to error log with variable types.
     */
    public static function log_verbose(mixed $output, int $depth = 1): mixed {
        error_log(message: self::generate_message(
            contents: Variable::pretty_var_dump_r(
                value: self::get_backtrace(depth: $depth)['args'][0],
                return: true,
            ),
            depth: $depth,
        ));

        return $output;
    }

    /**
     * Undocumented function.
     */
    private static function generate_message(
        string $contents,
        int $depth,
    ): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'separator_length', value: 210)
            ->assign(key: 'contents', value: $contents)
            ->assign(
                key: 'class',
                value: self::get_backtrace(depth: $depth + 2)['class'],
            )
            ->assign(
                key: 'function',
                value: self::get_backtrace(depth: $depth + 2)['function'],
            )
            ->assign(
                key: 'file',
                value: self::get_backtrace(depth: $depth + 1)['file'],
            )
            ->assign(
                key: 'line',
                value: self::get_backtrace(depth: $depth + 1)['line'],
            )
            ->output()
        ;
    }
}
