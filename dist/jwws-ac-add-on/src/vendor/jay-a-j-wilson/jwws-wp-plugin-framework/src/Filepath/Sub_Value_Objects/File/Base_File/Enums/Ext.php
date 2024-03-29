<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Enums;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * File extensions.
 */
enum Ext: string {
    case PHP = 'php';

    case HTML = 'html';

    case JS = 'js';

    case CSS = 'css';
}
