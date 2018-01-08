<?php

session_start();
$captcha=$_POST['captcha'];
if($captcha != $_SESSION['code']){
  $timer=rand(800,900);
  sleep($timer/100);
  echo "Enter correct captcha";
  exit();
}
require("class.phpmailer.php");


$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.devomark.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mohammed@devomark.com";  // SMTP username
$mail->Password = "12486230";                             //
$mail->From = "elvis@devomark.com";                                        //
$mail->FromName = "Elvis";
$mail->AddAddress("irfanansari568@gmail.com", "Irfan Ansari");


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];





$mail->Subject = "Request for services TK_website";
$mail->Body    = "Message:".$message."<br> Name:  ".$name."<br> Phone: ".$phone."<br> Email: ".$email; // this is the sender's Email address

$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "sent";


?>
