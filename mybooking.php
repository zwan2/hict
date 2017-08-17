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
  <div class="col-xs-12 col-sm-8 col-sm-offset-2">
    <h1 class="table_title">내 예약</h1>

    <div class="float_right">
      <inline class="grey">
      <strong>●대기</strong>
      </inline>
      <inline class="blue">
      <strong>　●승인</strong> 
      </inline>
      <inline class="red">
      <strong>　●거절</strong>
      </inline>
    </div>
    
  </div>
</div>

<br/>
 

<div class="container">
 <?=mybooking()?>
</div>



<script type="text/javascript" src="mybooking.js"></script>

<?php
include 'footer.html';
?>