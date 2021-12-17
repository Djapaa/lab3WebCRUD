<?php
require_once '../lab3web/application/config/product.php';



if(!isset($_SESSION)){
    session_start();
  }

  if ($_SESSION['user']['email']!= "admin" && $_SESSION['user']['password']!=md5("admin"))
  {
      header('Location: \ ');
  }

  $Product = new Post;
  $read=$Product->Read();

  if(isset($_REQUEST['Set']))
  {
      $set = $_REQUEST['Set'];
      foreach($read as $item)
      {
          if($item['id']==$set)
          {
                ?>
                
                <div class="reg_body ">
        <main class="reg_content reg_wrapper__line">
            <div class="info_center">
            <div class="siginin_option">
                </div>
            </div>
            <div class="register_form">
                <form action="" method="POST" class="form-size" enctype="multipart/form-data">
                <div class="field">
                    <input class="field_item__input" type="hidden"  name="id" value="<?=$item['id']?>" >
                    <label class="field_item__labal" for="gender" >gender</label>
                    <div class="email-input">
                    <input class="field_item__input" type="text" id="gender" name="gender" value="<?=$item['gender']?>">
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="text">cost</label>
                    <div class="email-input">
                    <input class="field_item__input" type="text" name="cost" value="<?=$item['cost']?>">
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="text">dateAdded</label>
                    <div class="email-input">
                    <input class="field_item__input" type="text" name="dateAdded" value="<?=$item['dateAdded']?>">
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="text">typeOfClothing</label>
                    <div class="email-input">
                    <input class="field_item__input" type="text" name="typeOfClothing" value="<?=$item['typeOfClothing']?>">
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="textarea">fullDescription</label>
                    <div class="email-input">
                    <textarea class="field_item__input" type="text" name="fullDescription" value=""><?=$item['fullDescription']?></textarea>
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="text">description</label>
                    <div class="email-input">
                    <input class="field_item__input" type="text" name="description" value="<?=$item['description']?>">
                    </div>
                    <div class="field">
                    <label class="field_item__labal" for="file">Photo</label>
                    <div class="email-input">
                    <input class="field_item__input" type="file" name="Photo" >
                    <? 
                    echo $item['photo'];
                    $path ='/application/core/images/'.$item['photo'];
                    ?>
                    </div>
                </div> 
                </div>
                <div class="signin-button">
                    <input  class="signin-button__input" type="submit" name="Set" value="Отправить"></input>
                
                    </div>
                </form>
                </div>
                <img src = "<?=$path?>" width="300px">
            </main>
            </div>
            <?

           
            
       
          }
          
      }
      if($_REQUEST['Set'])
      {

          if(!empty($_POST['gender']) && !empty($_POST['cost']) && !empty($_POST['dateAdded']) 
          && !empty($_POST['typeOfClothing'])&& !empty($_POST['fullDescription'])&& !empty($_POST['description']))
          {
              
              $id = $_POST['id'];
              $gender = $_POST['gender'];
              $cost = $_POST['cost'];
              $dateAdded = $_POST['dateAdded'];
              $typeOfClothing = $_POST['typeOfClothing'];
              $fullDescription = $_POST['fullDescription'];
              $description = $_POST['description'];
              $photo = $_FILES['Photo']['name'];
              
              
              
              $path = '../lab3web/application/core/images/'; // директория для загрузки
              $ext = array_pop(explode('.',$_FILES['Photo']['name'])); // расширение
              $new_name = time().'.'.$ext; // новое имя с расширением
              $full_path = $path.$new_name; // полный путь с новым именем и расширением
              echo $full_path;
              
              
            
              
                if($_FILES['Photo']['error'] == 0)
                {
                        if(move_uploaded_file($_FILES['Photo']['tmp_name'], $full_path))
                        {
                            if($Product->Set($id,$gender,$cost,$dateAdded,$typeOfClothing,$fullDescription,$new_name,$description))
                            {
                                header('Location: /admin');
                            }   
                        }
                    else{
                        echo 'Ошибка загрузки картинки '; 
                        }  
                            
                            }
                            else
                            {
                            echo 'ошибка $_files '; 
                            }
        
         }
    }
      
  }
?>
