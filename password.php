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

  require_once('./class.phpmailer.php');

  $mail             = new PHPMailer();

  $mail->IsSMTP(); // telling the class to use SMTP
  $mail->Host       = "mail.google.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                             // 1 = errors and messages
                                             // 2 = messages only
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "hictmailer@gmail.com";  // GMAIL username
  $mail->Password   = "zwan1233z";            // GMAIL password

  $mail->SetFrom('hictmailer@gmail.com', 'HICT 비밀번호');


  $mail -> CharSet = "UTF-8"; 
  $subject = "휴먼ICT 실습실 임시 비밀번호입니다.";
  $body = '비밀번호는 '.$password.' 입니다.';
  $mail->Subject = $subject;
  $mail->MsgHTML($body);

  $address = $email;
  $mail->AddAddress($address);
  
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo"<script>alert('새 비밀번호가 이메일로 전송되었습니다. 다시 로그인해주세요.'); location.href='login_page.php';</script>";
  }


}







?>