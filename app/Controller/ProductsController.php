<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;

class ProductsController extends Controller
{
	public function index()
	{
		$this->show('products/index');
	}

	public function read($id)
	{
		$this->show('products/read');
	}

}