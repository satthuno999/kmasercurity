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
    private function getServerBaseUrl()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = "https://";
        } else {
            $protocol = "http://";
        }
        $host = $_SERVER['HTTP_HOST'];

        // Retrieve the script name (e.g., "/nextcloud/index.php")
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $baseUrl = $protocol . $host . rtrim(dirname($scriptName), '/');

        return $baseUrl;
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
        $filePath = null;

        try {
            if (!is_string($folderName) || empty(trim($folderName))) {
                throw new \Exception('Invalid folder name.');
            }

            // // $userId = $this->userSession->getUser()->getUID();
            // $userFolder = $this->rootFolder->getUserFolder($this->userId);

            // // Check if the folder exists, and create it if it doesn't
            // if (!$userFolder->nodeExists($folderName)) {
            //     $folder = $userFolder->newFolder($folderName);
            // } else {
            //     $folder = $userFolder->get($folderName);
            // }

            // // Add or update the file with the given content
            // $file = $folder->newFile($fileName);
            // $file->putContent($fileContent);

            // $status = "success";
            // $path = $userFolder->getRelativePath($file->getPath());
            // $encodedPath = implode('/', array_map('rawurlencode', explode('/', $path)));
            // $filePath = $this->getServerBaseUrl() . '/remote.php/dav/files/' . $this->userId . $encodedPath;

            $appFolder = \OC::$SERVERROOT . '/apps/kmasercurity'; // Replace 'your_app_name' with the actual name of your app
            $publicPath = $appFolder . '/js'; // Set the desired public path within your app

            // Check if the folder exists, and create it if it doesn't
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }

            // Add or update the file with the given content
            $filePath = $publicPath . '/' . $fileName;
            file_put_contents($filePath, $fileContent);

            $status = 'success';
            $filePath = './js/' . $fileName;
        } catch (\Exception $e) {
            $status = "error";
            $message= "error: " . $e->getMessage();
        }

        $result = [
            'status' => $status,
            'filePath' => $filePath,
            'appFolder' => $appFolder,
            'message' => $message
        ];
        $response = new JSONResponse($result);
        return $response;
    }

    private function getDownloadUrl($file)
    {
        $view = new \OC\Files\View('/');
        $path = $view->getAbsolutePath($file->getPath());
        $token = $view->getFileInfo($path)['fileid'];
        $downloadUrl = \OC::$server->getURLGenerator()->linkToRoute(
            'download',
            ['file' => $token]
        );
        return $downloadUrl;
    }
}
