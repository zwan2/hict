<?php

$db = mysqli_connect("localhost", "root", "autoset", "hict");

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $query = "SELECT message FROM booking WHERE booking_id = $id";
 
  if($result = $db->query($query)) {
    //로그인 성공
    while($row = $result->fetch_assoc()) {
      echo $row['message'];
  
    }
  }

}
?>