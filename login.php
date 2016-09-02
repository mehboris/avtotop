<?php
// login.php

session_start();

try {
    $dbh = new PDO('mysql:host=localhost;dbname=testua_site', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$email = !empty($_POST['email']) ? trim($_POST['email']):'';
$password = !empty($_POST['password']) ? md5(trim($_POST['password'])):'';

$stmt = $dbh->prepare("	SELECT id, name, email FROM users 	WHERE email='$email' AND password='$password' LIMIT 1	"); 
$stmt->execute(); 
$record = $stmt->fetch();

if (empty($record)) {
  $_SESSION['error'] = 'Access denied!';
} else { 
          if($record['id']==1){
                    $_SESSION['error'] = '';
                    $_SESSION['isLogin'] = 1;
                    $_SESSION['user'] = $record;
                    header('Location: index.php');}
                    else { header('Location: main.php');
                  }

}
if (!empty($_SESSION['error'])) {
    header("Location:login_error.php");}
    else{

header('Location: index.php');}
