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
    function formatBytes($bytes, $precision = 2)
    {
        $size = (int)$bytes;
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }
}