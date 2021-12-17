<?php

if(!isset($_SESSION)){
    session_start();
  }
   

foreach($data as $item)
{
  echo $item['cost'].'<br>';
  echo $item['gender'].'<br>';
  echo $item['typeOfClothing'].'<br>';
  echo $item['description'].'<br>';
  echo $item['photo'].'<br>';

 ?><img src="../application/core/images/<?=$item['photo']?>" width=300> <?
  
}

 
?> 