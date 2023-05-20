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

use OC\Files\Filesystem;

namespace OCA\KmaSercurity\FileUtility;

class FileUtility
{

    public static function AddFile($folderName,$fileName,$fileContent){
        $appPath = \OC_App::getAppPath('kmasercurity');
        $folderPath = $appPath . $folderName;

        // Create the file within the folder
        $filePath = $folderPath . '/' . $fileName;
       
        // Check if the folder exists
        if (!Filesystem::is_dir($folderPath)) {
            // Folder does not exist, create it
            Filesystem::mkdir($folderPath);
        }
        Filesystem::file_put_contents($filePath, $fileContent);

        // Set appropriate permissions for the folder and file
        Filesystem::chmod($folderPath, 0755);
        Filesystem::chmod($filePath, 0644);

    }
}


