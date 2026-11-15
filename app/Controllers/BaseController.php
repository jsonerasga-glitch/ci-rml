<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}

	/**
	 * Returns a 422 response when a worksheet record has no saved calibration
	 * data (so no certificate can be rendered), or null when it is usable.
	 */
	protected function incompleteWorksheetResponse($record, array $fields = ['dataInputs', 'calculatedData'])
	{
		foreach ($fields as $field)
		{
			$value = $record[$field] ?? null;
			if ($record === null || $value === null || trim($value) === '' || empty(json_decode($value, true)))
			{
				return $this->response->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY)
					->setBody('This worksheet has no calibration data yet. Fill in and save the worksheet before generating a certificate.');
			}
		}

		return null;
	}
}
