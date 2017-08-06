<?php

$db = mysqli_connect("localhost", "root", "autoset", "hict");

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $query = "SELECT admin_name, admin_tel, message FROM booking WHERE booking_id = $id";
 
  if($result = $db->query($query)) {
    //로그인 성공
    while($row = $result->fetch_assoc()) {
		?>
		<div class="panel panel-default">
			<div class="panel-heading">담당자: <?=$row['admin_name']?>(<?=$row['admin_tel']?>)</div>
			<div class="panel-body">
				<?=$row['message']?>
			</div>
		</div>
		<?
    }
  }

}
?>