<?php 
  session_start(); 

  $Description="Service";
  $Keyword="AVTOTOP cars event map";
  $title="AVTOTOP";


  
  

  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  

 
    include "head_b.php";
    //include 'header.php';
  ?>
  
  <body>
  <div class="container-fluid">
      <div class="container-fluid cont_head_ev">
         <header>
            
              <h1>
                  <a class ="logo" href="main.php"></a>
              </h1>
              <ul class="head_ul">
                <li class="head_li"><a class="head_a <?php if($Description=="Map"):?>light<?php endif?>" href="map.php">Карта</a></li>
                <li class="head_li"><a class="head_a <?php if($Description=="Event"):?>light<?php  endif?>" href="event.php">Події</a></li>
                <li class="head_li"><a class="head_a <?php if($Description=="Service"):?>light<?php endif?>" href="service.php">Сервіс</a></li>
                <li class="head_li"><a class="head_a" href="contact.php">Контакти</a></li>
              </ul>
          </header>
      </div>
      <?php include "userheader.php" ?>
   
    
    <br>
    <div class="container-fluid element_ev">
          <div class="row">
                  <div class="col-md-1" id="date">
                    <p class="date_ev"><i>date/admin</i></p> 
                  </div><br>
          </div>
            <div class="row"> 
                  <div class="col-md-6" >
                    <p class="top_ev">Top of text</p>
                  </div>
            </div>
             <div class="row"> 
                  <div class="col-md-12" id="overflow">
                    <p class="text_ev">dfsdfsfdshgjdhgdkjfghkdsjghsdjfghdsjkghdsjkfghdkjfghdsjghsdjghjdkfghdkjf
                      dfsfsdfsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                      ssssssssssssssssssssssssssssssssssssssssssssssssssssssssdfffffffffffffffffffffffffffffffff
                      fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                      fffff</p>
                  </div>
              </div>
              <div class="row"> 
                  <div class="col-md-8" id="image">
                    <img src="">
                  </div>
              <div class="row">
                  <div class="col-md-offset-10 col-md-8" id="image">
                      <button type="submit" class="btn btn-default">Детально</button>
                  </div>
            </div>
      </div>
   </div>
   <br>








      <?php include "footer.php"; ?>
  </div>

</body>
    
</html>