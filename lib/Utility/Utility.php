<?php
declare(strict_types=1);

/**
 * 
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author 
 * @copyright 
 */

namespace OCA\KmaSercurity\Utility;

class Utility
{
    /**
     * @param string $bytes
     */
    public static function formatBytes($size, $precision = 2)
    {
        $sizeInt = (int)$size;
        $base = log($sizeInt, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }
}