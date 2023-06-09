<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Hiếu <binh9aqktk@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\KmaSercurity\Controller;

use OCA\KmaSercurity\AppInfo\Application;
use OCA\KmaSercurity\Models\HistoryModel;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\ContentSecurityPolicy;
use OCP\IRequest;
use OCP\Util;

class ContentController extends Controller
{
	public function __construct(IRequest $request)
	{
		parent::__construct(Application::APP_ID, $request);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function renderDashboard()
	{
		// Util::addScript(Application::APP_ID, 'kmasercurity-main');
		$url = "http://14.225.254.142:8080/api/v1/models";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);

		$dataResult = json_decode($data, true);
		if (isset($dataResult['data'][0]['id'])) {
			$detailUrl = "http://14.225.254.142:8080/api/v1/models/" . $dataResult['data'][0]['id'];

			$ch2 = curl_init($detailUrl);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			$dataDetail = curl_exec($ch2);
			curl_close($ch2);

			$historyDataUrl = "http://14.225.254.142:8080/api/v1/models/" . $dataResult['data'][0]['id'] . "/history";
			$ch3 = curl_init($historyDataUrl);
			curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
			$historyData = json_decode(curl_exec($ch3));
			$historyModel = new HistoryModel(
				$dataResult['data'][0]['id'],
				$historyData->data->accuracy,
				$historyData->data->val_accuracy,
				$historyData->data->loss,
				$historyData->data->val_loss,
			);
			curl_close($ch3);
		}

		$params = [
			'data' => $data,
			'model' => $dataDetail,
			'historyModel' => $historyModel
		];

		$response = new TemplateResponse('kmasercurity', 'views/dashboard', $params);
		$csp = new ContentSecurityPolicy();
		$csp->addAllowedMediaDomain('*');
		$csp->addAllowedScriptDomain("unsafe-inline");
		$csp->allowInlineScript(true);
		$csp->allowInlineStyle(true);
		$csp->allowEvalScript(true);
		$response->setContentSecurityPolicy($csp);
		return $response;
	}
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function renderAnalyze()
	{
		$response = new TemplateResponse('kmasercurity', 'views/analysis');
		return $response;
	}
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function analyzeFile()
	{
		$uploadedFile = $_FILES['file'];
		// Util::addScript(Application::APP_ID, 'kmasercurity-main');
		$url = "http://14.225.254.142:8080/api/v1/windows/applications";
		// Create a CURLFile object with the file path
		$file = new CURLFile($uploadedFile);

		// Create a new cURL resource
		$curl = curl_init();

		// Set the API endpoint URL
		curl_setopt($curl, CURLOPT_URL, $url);

		// Set the request method to POST
		curl_setopt($curl, CURLOPT_POST, true);

		// Set the file data as the POST payload
		$postData = array('file' => $file);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

		// Execute the request
		$data = curl_exec($curl);

		// Check for errors
		if (curl_errno($curl)) {
			$error = curl_error($curl);
			// Handle the error
		}

		// Close the cURL resource
		curl_close($curl);

		$params = [
			'data' => $data,
		];
		$response = new TemplateResponse('kmasercurity', 'views/analysis_detail', $params);
		return $response;
	}
}