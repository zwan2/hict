<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
$_SESSION['member_code'] = 0;
echo "<script>location.href='calendar.php';</script>";
?>