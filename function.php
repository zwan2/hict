<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");

if(mysqli_connect_errno()) {
	mysqli_connect_error();
}



function ensure_logged_in() {
    if(!isset($_SESSION['member_code'])) {
        echo"<script>alert('로그인하세요.'); location.href='login.html';</script>";
    }
}


?>