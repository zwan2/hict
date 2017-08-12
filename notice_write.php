<?php
include 'main.html';
?>

<div class="container">
	<div class="page-header">
	  <h1>공지 작성</h1>
	</div>

	<form method="post" action="notice_write2.php" name="notice" class="form-horizontal">
		
		<div class="form-group">
			<label for="exampleInputName2">제목</label>
			<input type="text" class="form-control" name="title" placeholder="제목">
		</div>
		<div class="form-group"> 
			<label for="exampleInputName2">내용</label>
			<textarea class="form-control" rows="10" name="content" placeholder="내용"></textarea>
			<br/>
		</div>

		<a class="btn btn-default" href="notice.php" role="button">뒤로</a>
		<button type="submit" onclick="return confirm('공지를 작성하시겠습니까?');" class="btn btn-primary">작성</button>

	</form>
</div>

<?php
include 'footer.html';
?>