<?php

require_once '../lab3web/application/config/product.php';




class Model_Man extends Model
{
	
	public function get_data()
	{	
        $Product = new Post;
        $read=$Product->Read();
        return $read;
	}

	public function get_element($id)
	{
		
		$Product = new Post;
        $read=$Product->get_one_element($id);
        return $read;
	}


}