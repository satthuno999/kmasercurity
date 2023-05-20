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
        $userId) 
    {
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
        $message = '';

        try {
            if (!is_string($folderName) || empty(trim($folderName))) {
                throw new \Exception('Invalid folder name.');
            }

            // $userId = $this->userSession->getUser()->getUID();
            $userFolder = $this->rootFolder->getUserFolder($this->userId);

            // Check if the folder exists, and create it if it doesn't
            if (!$userFolder->nodeExists($folderName)) {
                $folder = $userFolder->newFolder($folderName);
            } else {
                $folder = $userFolder->get($folderName);
            }

            // Add or update the file with the given content
            $file = $folder->newFile($fileName);
            $file->putContent($fileContent);

            $status = "success";
            $filePath = $file->getDownloadUrl();
        } catch (\Exception $e) {
            $status = "error";
            $message= "error: " . $e->getMessage();
            $filePath = null;
        }

        $result = [
            'status' => $status,
            'filePath' => $filePath,
            'message' => $message
        ];
        $response = new JSONResponse($result);
        return $response;
    }
}
