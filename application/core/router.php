<?php

class Route
{

    private $routes;


    public function __construct()
    {
        $this->routes = require_once('../lab3web/application/config/routes.php');
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
	public function run()
	{
      
    $uri = $this->getURI();
    
    foreach($this->routes as $uriPattern => $path){
       
        if(preg_match("~$uriPattern~" , $uri))
        {

            $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
            
            

            $segments = explode('/',$internalRoute);

		    
            $fControllerName = array_shift( $segments);
            $controllerName = 'controller_'.$fControllerName;

            
            
            $model_name = 'model_'.$fControllerName;
            $actionName = 'action_'.array_shift($segments);

            $parametrs = $segments;
            
            

            $controllerFile = '../lab3web/application/controller/'.
            $controllerName.'.php';
            
            if(file_exists($controllerFile))
            {
                include_once($controllerFile);
            }

            $model_file = '../lab3web/application/model/'.
            $model_name.'.php';
            
            
			$controllerObject = New $controllerName;
			$result = $controllerObject-> $actionName($parametrs);
			if($result != null)
			{
				break;
			}

        }

        
    }
       
	}
}
