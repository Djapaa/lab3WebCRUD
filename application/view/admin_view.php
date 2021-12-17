<?php 


require_once '../lab3web/application/config/product.php';

require_once '../lab3web/application/model/model_man.php';

// $db = new Model_Man();

// $id = '216';
// $rd = $db->get_elemen($id);

// print_r($rd);

if(!isset($_SESSION)){
    session_start();
  }

  $Product = new Post;
  $read=$Product->Read();



  if ($_SESSION['user']['email']!= "admin" && $_SESSION['user']['password']!=md5("admin"))
  header('Location: \main ');


?>
 <form action="insert" method="POST" enctype="multipart/form-data">
    <input type="submit" name="Insert" class="btn btn-success mb-1" value="Insert" ></i></input>
  </form>
<table class="table shadow ">
<thead class="thead-dark">
  <tr>
    <th>№</th>
    <th>gender</th>
    <th>cost</th>
    <th>dateAdded</th>
    <th>typeOfClothing</th>
    <th>fullDescription</th>
    <th>photo</th>
    <th>description</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  <?php foreach ($read as $item) { ?>
  <tr>
    <td><?=$item['id'] ?></td>
    <td><?=$item['gender'] ?></td>
    <td><?=$item['cost'] ?></td>
    <td><?=$item['dateAdded'] ?></td>
    <td><?=$item['typeOfClothing'] ?></td>
    <td><?=$item['fullDescription'] ?></td>
    <td><?=$item['photo'] ?></td>
    <td><?=$item['description'] ?></td>
    
    <td>
    <form action="set" method="POST" enctype="multipart/form-data">
      <input type="submit" class="btn btn-success btn-sm" name="Set" value="<?=$item['id']?>"></input> 
    </form>
    </td>
    <td>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="submit" class="btn btn-danger btn-sm" name="Delete" value="<?=$item['id']?>"></input>
    </form>
    </td>
  </tr> <?php } ?>
</thead>
</table>


<?php 
if(isset($_REQUEST['Delete']))
{
  
  $delete=$_REQUEST['Delete'];
  foreach($read as $item)
  {
    if($item['id']==$delete)
    {
      
      unlink('../lab3web/application/core/images/'.$item['photo']);
      
    }
    else
    {
      echo 'не существует такого изображения';
    }
  }
  
 $Product->Delete($delete);
  header("Location: /admin");
}


?>






