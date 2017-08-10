<?php
include 'function.php';
 if (isset($_REQUEST['id'])) {
	   
	$id = intval($_REQUEST['id']);
	$query = "SELECT * FROM booking WHERE booking_id =:booking_id";
	if($result = $db->query($query)) {
		if($row = $result->fetch_assoc()) {
		}
 	}
 ?>
   
<!-- 상세 예약 정보 modal -->
<div class="modal fade" id="detail_data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-title">상세 예약 정보</h4>
      </div>

      <div class="modal-body">
        
        <h4 class="modal-title">시간</h4>
	    <? $row['start_time']?>
        <br/><br/>

        <h4 class="modal-title" id="modalEnd">총 인원</h4>
        <span id="name"></span> 포함 <span id="total_number"></span>명
        <br/><br/>

        <h4 class="modal-title">용도</h4>
        <p id="purpose"></p>
        <br/>

        <h4 class="modal-title">장비</h4>
        <div id="tool">
        </div>
        <br/>

        <h4 class="modal-title">기타 사항</h4>
        <sapn id="extra"></sapn>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
        <button type="button" class="btn btn-primary">바로 예약</button>
      </div>
    </div>
  </div>
</div>
   
 <?php    
}