<?php
function Send_Mail($to,$subject,$body)
 {
require 'class.phpmailer.php';
 $from       = "from@localhost.com";
 $mail       = new PHPMailer();
 $mail->IsSMTP(true);            // используем протокол SMTP
 $mail->IsHTML(true);
 $mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию 
 $mail->Host       = "tls://smtp.localhost.com"; // SMTP хост
 $mail->Port       =  465;                    // устанавливаем SMTP порт
 $mail->Username   = "SMTP_Username";  //имя пользователя SMTP  
 $mail->Password   = "SMTP_Password";  // SMTP пароль
 $mail->SetFrom($from, 'From Name');
 $mail->AddReplyTo($from,'From Name');
 $mail->Subject    = $subject;
 $mail->MsgHTML($body);
 $address = $to;
 $mail->AddAddress($address, $to);
 $mail->Send(); 
 }
 ?>