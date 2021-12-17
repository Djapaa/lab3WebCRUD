<?php

class Controller_insert extends Controller
{

	function action_index()
	{	
		$this->view->generate('admininsert_view.php', 'template1_view.php');
	}
}