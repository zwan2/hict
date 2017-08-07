<?php
include 'main.html';

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


<!-- 전달사항(승인, 거절) modal -->
<div class="modal fade bs-example-modal-sm" id="message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">전달 사항</h4>
      </div>

      <!--ajax 기반 비동기 호출-->
      <div id="sdynamic-content" class="modal-body">
      </div>


       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>  
      </div>
      
    </div>
  </div>
</div>




<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">내 예약</div>
    <table class="table">
      <tr>
        <th>#</th>
        <th>날짜</th>
        <th>상태</th>
      </tr>
      <?=mybooking()?>
      
    </table>
    </div>



  </div>
</div>



</body>
</html>

<script type="text/javascript" src="mybooking.js"></script>