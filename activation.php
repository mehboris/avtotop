<?php
include 'db.php';
 $msg='';
 if(!empty($_GET['code']) && isset($_GET['code']))
 {
 $code=mysql_real_escape_string($_GET['code']);
 $c=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code'");
 if(mysqli_num_rows($c) > 0)
 {
 $count=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code' and status='0'");

 if(mysqli_num_rows($count) == 1)
 {
mysqli_query($connection,"UPDATE users SET status='1' WHERE activation='$code'");
 $msg="��� ������� �����������"; 
 }
 else
 {
 $msg ="��� ������� ��� �����������, ��� ������������� ������������ ��� �����.";
 }
 }
 else
 {
 $msg ="�������� ��� ���������.";
 }
 }
?>
//HTML �����
<?php echo $msg; ?>