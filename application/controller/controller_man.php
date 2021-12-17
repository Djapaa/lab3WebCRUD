<?php

require_once '../lab3web/application/model/model_man.php';
require_once '../lab3web/application/config/product.php';

class Controller_Man extends Controller
{

	function __construct()
	{
		$this->model = new Model_Man();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();	
		$this->view->generate('man_view.php', 'template_view.php', $data);
		return true;
	}

	function action_man($parametrs)
	{	
		
		$data = $this->model->get_element($parametrs[0]);	
		$this->view->generate('product_view.php', 'template_view.php', $data);
		return true;
	
		
	}
}