<?
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$db = new mysqli("localhost", "root", "autoset", "hict");

$password = $_POST['password'];
$password = crypt('hict', $password);
$crypt_password = $_POST['crypt_password'];


if($password == $crypt_password) {
	$query = "DELETE FROM member WHERE password = '$password' ";
	if($result = $db->query($query)) {
		echo"<script>alert('탈퇴되었습니다.'); location.href='login.html';</script>";
	}
	
}

?>