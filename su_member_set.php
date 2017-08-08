<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$db = new mysqli("localhost", "root", "autoset", "hict");

$student_number = $_GET['student_number'];
$admin_code = $_GET['admin_code'];
if($admin_code == 0) {
	$admin_code = 1;
}
else
	$admin_code = 0;

$query = "UPDATE member SET admin_code = $admin_code WHERE student_number = $student_number";

if($db->query($query)) {
	echo"<script>alert('변경되었습니다.'); location.href='su_member.php';</script>";
}

?>