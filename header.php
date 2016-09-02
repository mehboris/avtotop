<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php">AVTOTOP</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="map.php">КАРТА</a></li>
            <li><a href="event.php">ПОДІЇ</a></li>
            <li><a href="service.php">СЕРВІС</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span></a>
              <ul class="dropdown-menu">
                <li><a href="about.php">Про проект</a></li>
                <li><a href="contact.php">Контакти</a></li>             
              </ul>

            </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
             <?php include "userheader.php" ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>