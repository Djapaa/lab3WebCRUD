<?php

class Controller_set extends Controller
{

	function action_index()
	{	
		$this->view->generate('adminset_view.php', 'template1_view.php');
	}
}