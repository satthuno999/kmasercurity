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
		$response = new TemplateResponse('kmasercurity', 'analysis');
		return $response;
	}
}
