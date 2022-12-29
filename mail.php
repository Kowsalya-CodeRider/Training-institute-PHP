<?php 
// SEND EMAIL FROM ADMIN TO USER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$to = 'kowsalyaece97vpm@gmail.com';
$nameto = 'kowsalya';
$subject = 'test smtp';
$message = 'Worked succesfully';
$altmess = 'test@gmail.com';
sendmail($to,$nameto,$subject,$message,$altmess);
 function sendmail($to,$nameto,$subject,$message,$altmess)  {
  $from  = "info@innovaskill.in"; 
  $namefrom = "Innovaskill Technologies";
  $mail = new PHPMailer();
  $mail->SMTPDebug = 2;
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->SMTPAuth   = true;
  $mail->Host   = "mail.privateemail.com";
  $mail->Port       = 465;
  $mail->Username   = $from;
  $mail->Password   = "info@2020";
  $mail->SMTPSecure = "ssl";
  $mail->setFrom($from,$namefrom);
  $mail->addCC($from,$namefrom);
  $mail->Subject  = $subject;
  $mail->isHTML();
  $mail->Body = $message;
  $mail->AltBody  = $altmess;
  $mail->addAddress($to, $nameto);
  if($mail->send())
  {
	  echo 'send successfully';
  }
  else
  {
	  echo 'Error';
  }  
  
  //return $mail->send();
  
}
 ?>