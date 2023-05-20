<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: SPARK <binh9aqktk@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\KmaSercurity\Controller;

use OCA\KmaSercurity\AppInfo\Application;
use OC\Files\Filesystem;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\Files\IRootFolder;
use OCP\IRequest;
use OCP\Util;
use stdClass;

class FileController extends Controller {
    private $rootFolder;
    private $userId;
	public function __construct(
        $appName,
        IRequest $request,
    IRootFolder $rootFolder,
    $userId) {
		parent::__construct(Application::APP_ID, $request);
        $this->userId = $userId;
        $this->rootFolder = $rootFolder;

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
        $folderPath = $appPath .'/'. $folderName;
        $filePath = $folderPath . '/' . $fileName;
        $msg ="";
        try {
            $root = $this->rootFolder->->getUserFolder($this->userId);
            $folder = $root->get($folderName);
            
            // Check if the folder exists, and create it if it doesn't
            if (!$folder) {
                $folder = $root->newFolder($folderName);
            }
            
            // Add or update the file with the given content
            $file = $folder->newFile($fileName);
            $file->putContent($fileContent);    
        
            $status = "success";
        } catch (\Exception $e) {
            $status = "error";
            $msg="Error: ".$e->getMessage();
        }

        $result = [
            'status' => $status,
            'filePath' => $filePath,
            'msg' => $msg
        ];
        $response = new JSONResponse($result);
        return $response;
    }
}
