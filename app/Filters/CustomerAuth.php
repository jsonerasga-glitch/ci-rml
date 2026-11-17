<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Customer portal pages. Uses its own session keys (customerAccountId), so a
 * customer login never satisfies the staff "auth" filter and vice versa.
 */
class CustomerAuth implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (! session()->get('customerAccountId')) {
			return redirect()->to(site_url('customer/login'));
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}
}
