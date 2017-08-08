<?php
$db = new mysqli("localhost", "root", "autoset", "hict");

$title = $_POST['title'];
$content = $_POST['content'];
$today = date("Y-m-d");

$query = "INSERT INTO notice(title, content, write_time) VALUES ('$title', '$content', '$today')";
if($result = $db->query($query)) {
	echo"<script>location.href='notice.php';</script>";
}


?>