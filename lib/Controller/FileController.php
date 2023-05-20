<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: SPARK <binh9aqktk@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\KmaSercurity\Controller;

use OCA\KmaSercurity\AppInfo\Application;
use OCA\KmaSercurity\FileUtility;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use OCP\Util;
use stdClass;

class FileController extends Controller {
	public function __construct(IRequest $request) {
		parent::__construct(Application::APP_ID, $request);
	}

	/**
     * Add file js
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     * @param string $folderName
     * @param string $fileName
     * @param string $fileContent
     * @return JSONResponse
     */
    public function addJsFile($folderName,$fileName,$fileContent)
    {
        $status = '';
        $appPath = \OC_App::getAppPath('kmasercurity');
        $folderPath = $appPath . $folderName;
        $filePath = $folderPath . '/' . $fileName;
        $msg ="";
        try {
            // Check if the folder exists
            if (!Filesystem::is_dir($folderPath)) {
                // Folder does not exist, create it
                Filesystem::mkdir($folderPath);
            }
        
            // Create or update the file with the given content
            Filesystem::file_put_contents($filePath, $fileContent);
        
            // Set appropriate permissions for the folder and file
            Filesystem::chmod($folderPath, 0755);
            Filesystem::chmod($filePath, 0644);
        
            $status = "success";
        } catch (\Exception $e) {
            $status = "error";
            $msg="Error: $e";
        }

        $result = [
            'status' => $status,
            'filePath' => $filePath,
            'msg' => $msg,
        ]
        return new JSONResponse($result);
    }
}
