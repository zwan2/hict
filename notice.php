<?php
	include 'main.html';
?>



<div class="container">

	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">공지사항</div>


		<table class="table">
			<tr>
				<th>#</th>
		    	<th>제목</th>
		    	<th>작성일</th>
		    </tr>
		    <?=notice()?>
		</table>
	</div>
</div>

</body>
</html>