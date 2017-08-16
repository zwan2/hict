<?php
include 'main.html';



if (isset($_GET['notice_id'])) {
  $notice_id = $_GET['notice_id'];
  $query = "SELECT * FROM notice WHERE notice_id = $notice_id";
  if($result = $db->query($query)) {
  	if($row = $result->fetch_assoc()) {
  		?>
  		

		<div class="container">
			<div class="page-header">
		    <h1><a href="notice.php">공지사항</a></h1>
		</div>

			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?=$row['title']?></h3>
			  </div>
			  <div class="panel-body">
			    <?=$row['content']?>
			  </div>
				<ul class="list-group">
					<li class="list-group-item"><?=$row['write_time']?></li>
				</ul>

			</div>
			<br/>

			<a class="btn btn-default" onclick="window.history.back();" role="button">뒤로</a>
			<?
				if($_SESSION['admin_code']!= 0) {
					echo"<td><a href=\"notice_delete.php?notice_id=$notice_id\" onclick=\"return confirm('정말 공지를 삭제하시겠습니까?');\">삭제</a></td>";
				}
			?>
		</div>

 		<?
 	}
  }
}




include 'footer.html';
?>