<?php
include 'function.php';

//랜덤 패스워드 생성
$ipassword="0123456789"; 
$password="";
for($i=0;$i<8;$i++){ 
	$password.=$ipassword[rand(0,9)]; 
} 
$crypt_password = crypt('hict', $password);

$email = $_POST['email'];

$query = "UPDATE member SET password = '$crypt_password' WHERE email = '$email'";

//비밀번호 변경 성공
if($result = $db->query($query)) {
	echo $password;
}



$subject = "휴먼ICT 실습실 임시 비밀번호입니다.";
$message = '비밀번호는 $password입니다.';


/*
error_reporting(E_STRICT);

require_once('/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = $message;


$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.konkuk.ac.kr"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "mail.konkuk.ac.kr"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "zwan@konkuk.ac.kr"; // SMTP account username
$mail->Password   = "thedhks2";        // SMTP account password

$mail->SetFrom('zwan@konkuk.ac.kr', 'First Last');

$mail->AddReplyTo("zwan@konkuk.ac.kr","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address, "John Doe");


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

/*

$mail             = new PHPMailer();

$body             = $message;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.google.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "zwaninkt@gmail.com";  // GMAIL username
$mail->Password   = "thedhks2";            // GMAIL password

$mail->SetFrom('zwaninkt@gmail.com', 'First Last');

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address, "John Doe");
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}


*/

?>