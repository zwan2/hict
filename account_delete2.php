<?
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$password = $_POST['password'];
$password = crypt('hict', $password);
$crypt_password = $_POST['crypt_password'];


if($password == $crypt_password) {
	$query = "DELETE FROM member WHERE password = '$password' ";
	if($result = $db->query($query)) {
		echo"<script>alert('탈퇴되었습니다.'); location.href='/';</script>";
	}
	
}
else {
	echo"<script>alert('비밀번호가 잘못되었습니다.'); location.href='account_delete.php';</script>";
}
?>