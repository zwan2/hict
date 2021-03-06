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

      <form method="post" onsubmit="return message_check();" action="bookinglist_change.php" name="bookinglist_message" class="form-horizontal">
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
  <div class="col-xs-12 col-sm-8 col-sm-offset-2">
    <h1 class="table_title"><a href="bookinglist.php">예약 리스트</a></h1>

    <div class="float_right">
      <inline class="grey">
      <strong>● 대기</strong>
      </inline>
      <inline class="blue">
      <strong>　● 승인</strong> 
      </inline>
      <inline class="red">
      <strong>　● 거절</strong>
      </inline>
      
      <a href="#" id="subscribe-link" style="display: none;">알림 허용</a>
      <? 
      if($_SESSION['admin_code']==2) {
          ?><a class="grey" href="#" onclick="location.href='su_member.php'" role="button">회원관리</a><?}
      ?>
    </div>
    
  </div>
</div>

<br/>


<div class="container">
  <?=bookinglist()?>


  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <form method="get" action="<?=$_SERVER['SCRIPT_NAME']?>" onsubmit="return search_check();" name="booking_search" class="form-horizontal">
        <div class="input-group">    
          <input type="text" name="search" class="form-control" placeholder="예약자명, 관리자명으로 검색">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">검색</button>
          </span>
        </div><!-- /input-group -->
      </form>
    </div><!-- /.col-lg-6 -->
  </div><!-- /.row -->

  <script>
      function subscribe() {
          OneSignal.push(["registerForPushNotifications"]);
          event.preventDefault();
      }

      var OneSignal = OneSignal || [];
      /* This example assumes you've already initialized OneSignal */
      OneSignal.push(function() {
          // If we're on an unsupported browser, do nothing
          if (!OneSignal.isPushNotificationsSupported()) {
              return;
          }
          OneSignal.isPushNotificationsEnabled(function(isEnabled) {
              if (isEnabled) {
                  // The user is subscribed to notifications
                  // Don't show anything
              } else {
                  document.getElementById("subscribe-link").addEventListener('click', subscribe);
                  document.getElementById("subscribe-link").style.display = '';
              }
          });
      });
  </script>

</div>




<?php
include 'footer.html';
?>

<script type="text/javascript" src="bookinglist.js"></script>

<script>
function message_check() {
  var form = document.bookinglist_message;
  if(form.booking_state.value == "") {
    return false;
  }
}
function search_check() {
  var form = document.booking_search;

  //검색어
  if(form.search.value == "") {
      form.search.focus();
      return false;
    }

}
</script>