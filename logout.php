<?php
session_start();
session_destroy();
echo"<script>location.href='login_page.php';</script>";
?>