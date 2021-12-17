<?php
require_once 'connect.php';

class Post extends DataBase{

    public function Read()
    {   
        return parent::select("SELECT * FROM `shoplist`", array());
    }
    public function Insert($gender,$cost,$dateAdded,$typeOfClothing,$fullDescription,$photo,$description)
    {   
        
         $query = "INSERT INTO `shoplist` (`id`, `gender`, `cost`, `dateAdded`, `typeOfClothing`, `fullDescription`, `photo`, `description`) 
         VALUES (NULL, '$gender','$cost', '$dateAdded', '$typeOfClothing', '$fullDescription', '$photo','$description')";
         return parent::query($query, array());
    }
    public function Delete($id)
    {   
        
         $query = "DELETE FROM `shoplist` WHERE `id`={?}";
         return parent::query($query, array($id));
    }
    public function Set($id,$gender,$cost,$dateAdded,$typeOfClothing,$fullDescription,$photo,$description)
    {   
        
         $query = "UPDATE `shoplist` SET 
         `gender`='$gender',`cost`='$cost',`dateAdded`='$dateAdded',`typeOfClothing`='$typeOfClothing',`fullDescription`='$fullDescription',
         `photo`='$photo',`description`='$description' WHERE `id`={?}";

         return parent::query($query, array($id));
    }
    public function get_one_element($id)
    {   
     $query = "SELECT * FROM `shoplist` WHERE `id`={?}";
     return parent::select($query, array($id));
    }
}
