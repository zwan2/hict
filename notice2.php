<?php
include 'main.html';



if (isset($_GET['notice_id'])) {
  $id = $_GET['notice_id'];
  $query = "SELECT * FROM notice WHERE notice_id = $id";
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
		</div>

 		<?
 	}
  }
}
?>





</body>
</html>