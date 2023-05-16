<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Hiếu <binh9aqktk@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\KmaSercurity\Controller;

use OCA\KmaSercurity\AppInfo\Application;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use OCP\Util;

class PageController extends Controller {
	public function __construct(IRequest $request) {
		parent::__construct(Application::APP_ID, $request);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index(){
		// Util::addScript(Application::APP_ID, 'kmasercurity-main');
		$url = "http://14.225.254.142:8080/api/v1/models";
		$request = new XMLHttpRequest();

		$request->open('GET', $url);
		$request->setRequestHeader('Content-Type', 'application/json');
		$request->send();
		$response = json_decode($request->responseText);

		$response = new TemplateResponse('kmasercurity', 'index', ['data' => $response->data]);
		return $response;
	}
}
