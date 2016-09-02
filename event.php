<?php 
  session_start(); 

  $Description="Event";
  $Keyword="AVTOTOP cars event map";
  $title="AVTOTOP";


  
  

  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 

  try {
            $dbh = new PDO('mysql:host=localhost;dbname=testua_site', 'root', '');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();

        }
         $max = $dbh->query('SELECT MAX(id) FROM `news`');
         $max = $max->fetch();
   $result = $dbh->query('SELECT news.*, users.name AS `userName` FROM news JOIN users ON (news.user_id = users.id);'); 

 
    include "head_b.php";
    //include 'header.php';
  ?>
  
  <body>
  
      <div class="container-fluid cont_head_ev" id="content">
         <header>
            
              <h1>
                  <a class ="logo" href="main.php"></a>
              </h1>
              <ul class="head_ul">
                <li class="head_li"><a class="head_a <?php if($Description=="Map"):?>light<?php endif?>" href="map.php">Карта</a></li>
                <li class="head_li"><a class="head_a <?php if($Description=="Event"):?>light<?php  endif?>" href="event.php">Події</a></li>
                <li class="head_li"><a class="head_a <?php if($Description=="Service"):?>light<?php endif?>" href="service.php">Сервіс</a></li>
                <li class="head_li"><a class="head_a" href="#contact">Контакти</a></li>
              </ul>
          </header>
     
      <?php include "userheader.php" ?>
   <br><br> <br><br>
    <br><br>  <br><br>
    <br>
    <?php
      
     $max=(int) $max;
      
      
      for($k=0; $k<$max;$k++){
     foreach ($result as $row) : 
      
      
    ?>
              <div class="container-fluid element_ev">
                    <div class="row-fluid">
                            <div class="col-md-1" id="date">
                              <p class="date_ev"><i><?=  $row['created_date'] ?></i></p> 
                            </div><br>
                    </div>
                      <div class="row-fluid"> 
                            <div class="col-md-6" >
                              <p class="top_ev"><?= $row['title'] ?></p>
                            </div>
                      </div>
                       <div class="row-fluid"> 
                        <div class="col-md-8" id="image">
                              <img src="<?= $row['img'] ?>">
                            </div>
                            
                        </div>
                        <div class="row-fluid"> 
                          <div class="col-md-12" id="overflow">
                              <p class="text_ev"><?= $row['body'] ?></p>
                            </div>
                        </div> 
                        <div class="row-fluid">
                            <div class="col-md-offset-10 col-md-8" id="button">
                                  <a href="<?= $row['link'] ?>" class="btn btn-default btn-lg active" role="button">Детально</a>
                            </div>
                      </div>
                      
              </div>

            
   <br>
   <?php endforeach;} ?>
  







      <?php include "footer.php"; ?>
  </div>

</body>
 <script type="text/javascript">


 

 window.onscroll = function () 
{
    var clientHeight = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight;
    var documentHeight = document.documentElement.scrollHeight ? document.documentElement.scrollHeight : document.body.scrollHeight;
    var scrollTop = window.pageYOffset ? window.pageYOffset : (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);

    if((documentHeight - clientHeight) <= scrollTop)
    {
         
      }
}
 
  
  
 </script>   
</html>