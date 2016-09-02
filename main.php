<?php 
  session_start(); 

  $Description="Main page";
  $Keyword="AVTOTOP cars event map";
  $title="AVTOTOP";


  
  

  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  

 
    include "head_b.php";
  ?>
  <body>
  <div class="container-fluid ">

      <header>
        
          <h1>
              <a class ="logo" href="#home"></a>
          </h1>
          <ul class="head_ul">
            
            
            <li class="head_li"><a class="head_a" href="#contact">Контакти</a></li>
          </ul>
      </header>

<?php include "userheader.php" ?>
     <div class="row-fluid">
                
                <div class="under_header col-md-12" id="zm_b">
                    <div class="Text1">Be on <span class="light H">AVTOTOP</span>
                    </div>
                    <ul class="menu" id="menu">
                        <li class="menu_li" onMousemove="backg(1)" onclick="goto(1)"><a class="menu_a"  href="map.php">КАРТА<br>Отримай маршут</a>
                        <li class="menu_li" onMousemove="backg(2)" onclick="goto(2)"><a class="menu_a"  href=" event.php">ПОДІЇ<br>Підвищуй SKILL</a>
                        <li class="menu_li" onMousemove="backg(3)" onclick="goto(3)"><a class="menu_a"  href="service.php">СЕРВІС<br>Будь у формі</a>
                    </ul>
                </div>
    </div>         

 
    <?php include "footer.php"; ?>
</body>
    <script src="menu.js"></script>
    <script type="text/javascript">
function goto(x){
  switch (x){
    case 1: document.location.href="map.php"; break;
    case 2:document.location.href="event.php";break;
    case 3:document.location.href="service.php"; break;
  }
 }
    </script>
</html>