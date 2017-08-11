<?php
  include 'main.html';
  admin_back($_SESSION['admin_code']);
?>


<div class="container">
 <div class="panel panel-default">
  <div class="panel-heading">회원 관리</div>

  <table class="table">
    <tr> 
      <th>#</th>
      <th>학번</th>
      <th>이름</th>
      <th>이메일</th>
      <th>전화번호</th>
      <th>상태</th>
    </tr>
    <?=su_member()?>
  

  <div class="row">
    <div class="col-lg-6">
      <form method="get" action="<?=$_SERVER['SCRIPT_NAME']?>" name="booking_search" class="form-horizontal">
        <div class="input-group">    
          <input type="text" name="search" class="form-control" placeholder="예약자명, 관리자명으로 검색">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">검색</button>
          </span>
        </div><!-- /input-group -->
      </form>
    </div><!-- /.col-lg-6 -->
  </div><!-- /.row -->






</div>

</body>
</html>

