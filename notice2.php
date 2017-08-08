<?php
include 'main.html';



if (isset($_GET['notice_id'])) {
  $id = $_GET['notice_id'];
  $query = "SELECT * FROM notice WHERE notice_id = $id";
  if($result = $db->query($query)) {
  	if($row = $result->fetch_assoc()) {
  		?>

		<div class="container">

			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?=$row['title']?></h3>
			  </div>
			  <div class="panel-body">
			    <?=$row['content']?>
			  </div>
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