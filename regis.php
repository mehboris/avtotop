<?php session_start(); 

  $Description="Registration page";
  $Keyword="AVTOTOP Registration";
  $title="Registration";
  
  

  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  
  $name = !empty($_POST['name']) ? trim($_POST['name']):'';
  $car = !empty($_POST['car']) ? trim($_POST['car']):'';
  $about_you = !empty($_POST['about']);
  $newEmail = !empty($_POST['newEmail']) ? trim($_POST['newEmail']):'';
  $newPassword = !empty($_POST['newPassword']) ? trim($_POST['newPassword']):'';
  $subPassword = !empty($_POST['subPassword']) ? trim($_POST['subPassword']):'';
  $emptyField=FALSE;
  if(empty($newEmail)||empty($newPassword)||empty($subPassword)){ $emptyField=TRUE;}
  $simplyPass=FALSE;
  $simplyEmail=FALSE;
  $msg='';
  if (strcmp($newPassword, $subPassword) == 0){$simplyPass=TRUE;
            try {
            $dbh = new PDO('mysql:host=localhost;dbname=testua_site', 'root', '');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();

        }
   


       if(!empty($newEmail) && isset($newEmail) &&  !empty($subPassword) &&  isset($subPassword) &&  !empty($newPassword) &&  isset($newPassword))
             {$email=$newEmail;
            // имя пользователя и пароль отправлены из формы
            // $email=mysql_real_escape_string($newEmail);
             //$password=mysql_real_escape_string($newPassword);
            // $sPassword=mysql_real_escape_string($subPassword);
             //$car=mysql_real_escape_string($car);
             //$about_you=mysql_real_escape_string($about_you);
             //$name=mysql_real_escape_string($name);
            // регулярное выражение для проверки написания адреса электронной почты
             $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
             if(preg_match($regex, $email))
               { 
                     $password=md5($newPassword); // encrypted password
                     $sPassword=md5($subPassword);
                         $count = $dbh->query("SELECT COUNT( * ) FROM `users` WHERE `email` = '$email'");
                    // $count->execute() or die(print_r($dbh->errorInfo(), true));
                       //die();
                    $num_rows = $count->fetchColumn();
                   //  var_export($count);
                    // var_export($num_rows);

                     //$num=$count->num_rows;
                    // проверка адреса электронной почты
                     if ($num_rows < 1)
                                         {$simplyEmail=TRUE;
                                           //var_export($count);
                                          //var_export($email);
                                          //var_export($name);
                                          //var_export($password);
                                          //var_export($car);
                                          //var_export($about_you); 
                                          
                                         $sql = $dbh->exec("INSERT INTO `users`(`id`, `email`, `name`, `password`, `car`, `about`) VALUES (NULL, '$email', '$name', '$password', '$car', '$about_you')");
                                         //$sql->execute() or die(print_r($dbh->errorInfo(), true));
                                         //die();  
                              
                                        // отправка письма на электронный ящик
                                        //include 'Send_Mail.php';
                                        // $to=$email;
                                         //$subject="Подтверждение электронной почты";
                                         //$body='Здравствуйте! <br/> <br/> Мы должны убедиться в том, что вы человек. Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на сайте. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';

                                        //Send_Mail($to,$subject,$body);
                                         $msg= "Реєстрація пройшла успішно.";
                                          header('Location: login_error.php?m=1');

                                         }
                                           else
                                             {$simplyEmail=FALSE;
                                             $msg= 'Дана адреса електронної пошти вже зайнята, будь ласка, введіть іншу. '; 
                                             }
                 }
                                             else
                                             {$normEmail=FALSE;
                                             $msg = 'Адреса, введенна вами, невірна. Будь ласка, спробуйте ще раз.'; 
                                             }
                                             }}
?>


   <?php include "head_b.php";
   include "header.php"; ?>
   <div class="row-fluid login">   
    <div class="col-md-6 col-md-offset-3">
   <h1>Реєстрація</h1>
          <?php if ($simplyPass==FALSE) :?>
            <br><label><h3>Неоднакові паролі</h3></label>
          <?php endif ?><br>
          <?php if ($emptyField==TRUE) :?>
            <br><label><h3>Незаповнені поля</h3></label>
          <?php endif ?>
          <?php if ($msg) :?>
            <br><label><h3><?php echo $msg; ?></h3></label>
          <?php endif ?><br>
      <form role="form" method="post" action="regis.php">
           <div class="form-group">
            
           </div>
           <div class="form-group">
            <label for="name">Ім'я</label>
            <input class="form-control" type="text" name="name" placeholder="Name" value="<?php if (!($simplyPass&&$simplyEmail&&$normEmail)) {echo $name;} ?>">
          </div>
           <div class="form-group">
            <label for="car">Авто</label>
            <input type="text" class="form-control" name="car" placeholder="Car" value="<?php if (!($simplyPass&&$simplyEmail&&$normEmail)) {echo $car;} ?>">
          </div>
           <div class="form-group">
            <label for="about">Про себе</label>
            <textarea class="form-control" name="about" rows="3" value="<?php if (!($simplyPass&&$simplyEmail&&$normEmail)) {echo $about_you;} ?>"></textarea>
          </div>

          <div class="form-group">
            <label for="InputEmail">Email*</label>
            <input type="email" class="form-control" id="InputEmail" name="newEmail" placeholder="<?php if($simplyEmail&&$normEmail){echo 'Enter email';} ?>" value="<?php if (!$simplyPass) {echo $newEmail;} ?>">
          </div>
          <div class="form-group">
            <label for="newPassword">Пароль*</label> 
            <?php if (strcmp($newPassword, $subPassword) != 0) :?>
            <label class="glyphicon glyphicon-remove form-control-feedback"></label>
          <?php endif ?>
            <input type="password" class="form-control" name="newPassword" placeholder="Password">
           
          </div>
          <div class="form-group">
            <label for="subPassword">Ще раз*</label> 
            
            <input type="password" class="form-control" name="subPassword" placeholder="Password">
            
          
          </div>

          <button type="submit" class="btn btn-success">Відправити</button><?php ?>
          

      </form>
    </div>
    </div>
 
</body>
</html>