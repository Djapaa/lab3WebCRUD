<?php

class Controller_Signin extends Controller
{

	function action_index()
	{	
		$this->view->generate('signin_view.php', 'template_view.php');
		return true;
	}
}