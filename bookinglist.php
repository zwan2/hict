<?php
  include 'main.html';
  admin_back($_SESSION['admin_code']);
?>


<!-- 상세 예약 정보 modal -->
<div id="detail_data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="modal-title" class="modal-title">상세 예약 정보</h4>
      </div>

      <!--ajax 기반 비동기 호출-->
      <div id="dynamic-content" class="modal-body">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
      </div>
    </div>
  </div>
</div>



<!-- 상태변경(대기, 승인, 취소) modal -->
<div class="modal fade bs-example-modal-sm" id="message">
  <div class="modal-dialog modal-sm"> 
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle">승인 여부</h4>
      </div>

      <form method="post" action="bookinglist_change.php" name="bookinglist_message" class="form-horizontal">
        <!--ajax 기반 비동기 호출-->
        <div id="sdynamic-content" class="modal-body">
        </div>


         <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="return confirm('예약 상태를 변경하시겠습니까?');">확인</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>  
        </div>
      </form>
      
    </div>
  </div>
</div>




<div class="container">
 <div class="panel panel-default">
  <div class="panel-heading">예약 리스트</div>

  <table class="table">
    <tr> 
      <th>#</th>
      <th>날짜</th>
      <th>예약자</th>
      
      <th>상태</th>
    </tr>
    <?=bookinglist()?>
  


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


<script type="text/javascript" src="bookinglist.js"></script>