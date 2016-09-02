<?session_start(); 

  $Description="Login_error page";
  $Keyword="AVTOTOP Login or Registration";
  $title="Login or Registration";
  
  $msg=$_GET['m'];
  //var_export($msg);
  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  include "head_b.php";?>

 <body>

   <?php include "header.php"; ?>
   <div class="row-fluid login">   
    <div class="col-md-6 col-md-offset-3">
    <?php if(!empty($msg)):?>
    <h1>Реєстрація пройшла успішно. Спробуйте ввійти!</h1><br><br>
     <?php endif; ?> 
    <?php if (!empty($_SESSION['error'])&&(empty($msg))) :?>
    <h1>Неправильний логін/пароль!</h1><br><br>
    <?php endif; ?> 
      <form role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-success">Ввійти</button>
          <a class="btn btn-info" href="regis.php">Реєстрація</a>

      </form>
    </div>
    </div>
  
</body>
</html>