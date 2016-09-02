<?php
session_start();

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
//var_export($_POST);
if (!empty($_POST)){
$a=$_POST['a'];
}
if (!empty($_POST)&&($a==2)){
  //logic for update/insert
  $a=$_POST['a'];
  $id = $_POST['id'];
  $p_name = $_POST['p_name'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];
  $icon_link = $_POST['icon_link'];
  $content = $_POST['content'];
  $about = $_POST['about'];
  $image = $_POST['image'];
  $userId = $_SESSION['user']['id'];
?> <pre><?php echo $a;
///echo $id;?></pre>
<?php


  if (!empty($_POST['id'])) {
    $sql = "UPDATE `service` SET `p_name`='$p_name', `lat`='$lat', `lng`='$lng', `icon_link`= `$icon_link`, `content`= `$content`, `about`= `$about`, `image`= `$image` WHERE id=".$_POST['id'].";";
  } else {
    $sql = "INSERT INTO `service` (`id`, `p_name`, `lat`, `lng`, `icon_link`,`content`, `about`, `image`) VALUES (NULL, $p_name, $lat, $lng, $icon_link,$content, $about, $image);";
  }
  
  $dbh->exec($sql);
  header('Location: index.php');
  die();
}

if(!empty($_POST)) {
  //logic for update/insert
  
  $title = $_POST['title'];
  $body = $_POST['body'];
  $link = $_POST['link'];
  $userId = $_SESSION['user']['id'];

  if (!empty($_POST['id'])) {
    $sql = "UPDATE `news` SET `title`='$title', `body`='$body', `link`='$link', `user_id`= $userId WHERE id=".$_POST['id'].";";
  } else {
    $sql = "INSERT INTO `news` (`id`, `title`, `body`, `link`, `user_id`, `created_date`) VALUES (NULL, '$title', '$body', '$link', $userId, NOW());";
  }
  
  $dbh->exec($sql);
  header('Location: index.php');
  die();
}

$action = !empty($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
  case "create":
    //show form
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }

    include "form.php";
    break;
  case "update":
    //select record
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }

    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      echo 'Wrong parameter!';
      die();
    }

    $stmt = $dbh->prepare("SELECT * FROM news WHERE id = $id LIMIT 1"); 
    $stmt->execute(); 
    $record = $stmt->fetch();
    if (empty($record)) {
      echo 'NOT FOUND';
      die();
    }
    // show form
    include "form.php";
    break;

  case "delete":
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }

    //delete record
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      echo 'Wrong parameter!';
      die();
    }
    $dbh->exec("DELETE FROM `news` WHERE id=$id");
    header('Location: index.php');
    break;

    case "table1":
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }
    $result = $dbh->query('SELECT news.*, users.name AS `userName` FROM news JOIN users ON (news.user_id = users.id);');
    include "table.php";
    break;


  case "table2":
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }
    $result = $dbh->query('SELECT * FROM `service`');
    include "table2.php";
    break;

  case "update2":
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      echo 'Wrong parameter!';
      die();
    }

    $stmt = $dbh->prepare("SELECT * FROM service WHERE id = $id LIMIT 1"); 
    $stmt->execute(); 
    $record = $stmt->fetch();
    if (empty($record)) {
      echo 'NOT FOUND';
      die();
    }
    // show form
    include "form2.php";
    break;


    case "delete2":
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }

    //delete record
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      echo 'Wrong parameter!';
      die();
    }
    $dbh->exec("DELETE FROM `service` WHERE id=$id");
    header('Location: index.php');
    break;


case "create2":
    //show form
    if (!loadUser()) {
      header('Location: index.php');
      die();
    }

    include "form2.php";
    break;



  case "index":
  default:
    // show table

    $result = $dbh->query('SELECT news.*, users.name AS `userName` FROM news JOIN users ON (news.user_id = users.id);');
    include "table.php";
    break;
}

