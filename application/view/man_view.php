<link href="/css/style.css" rel="stylesheet" type="text/css"/>
<main class="main">
            <div class="container">
            <div class="post_wrapper">
                 <div class="post_inner">
<?php

if(!isset($_SESSION)){
    session_start();
  }

  foreach($data as $item)
  {
  
?> 
                <article class ="post">
                    <a href ="/man/<?=$item['id']?>" class = "post_link">
                        <div class= "post_img__wrapper">
                            <img class="post_img" src="application/core/images/<?=$item['photo']?>"  >
                        </div>
                        <div class="post_name">
                            <p class="post_name__desc"><?=$item['description']?></p>
                           
                            <p class ="post_cost">
                            <?=$item['cost']?>
                            </p>
                        </div>
                       
                    </a>
                </article>
                <?}?>
            </div>
        </main>
    </div>
        
  
</body>

</html>




   

               
            
