<?php
include 'main.html';



if (isset($_GET['notice_id'])) {
  $notice_id = $_GET['notice_id'];
  $query = "SELECT * FROM notice WHERE notice_id = $notice_id";
  if($result = $db->query($query)) {
  	if($row = $result->fetch_assoc()) {
  		?>
  		<div class="container">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<h1 class="table_title">공지사항</h1>
				<h3 id="notice_title"><?=$row['title']?></h3>
				<div class="panel panel-default">
				  <div class="panel-body">
				  	<p class="grey"><?=$row['content']?></p>
				  </div>
				</div>
				<inline class="grey"><?=$row['write_time']?></inline>
				
				<div class="float_right">
					<a href="#" id="notice_back" onclick="window.history.back();" role="button">뒤로</a>
					<?
					if($_SESSION['admin_code']!= 0) {
						echo"<td><a id=\"notice_delete\" href=\"notice_delete.php?notice_id=$notice_id\" onclick=\"return confirm('정말 공지를 삭제하시겠습니까?');\">삭제</a></td>";
					}
					?>
				</div>
			</div>
		</div>


 		<?
 	}
  }
}




include 'footer.html';
?>