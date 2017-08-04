<?php
    include 'main.html';
    include 'calendar2.php';
    echo $_SESSION['name'];

?>


<div class="container">

  <!-- 공지사항 패널 -->  
  <div class="panel panel-default"> 
    <div class="panel-body">
        <div id="panel-body-notice">
          <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
          <a href="notice2.php">공지사항</a>
        </div>
        <div id="panel-body-more">
        <a href="notice.php"><span class="glyphicon glyphicon-menu-right" aria-hidden="true">
        </span></a>
        </div>
    </div>
  </div><!--panel-->
  <br/>


  <!-- 예약하기 버튼-->
  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#booking">
    예약하기
  </button>
  <br/>


  <!-- full calendar 호출 -->
  <!-- jquery는 main.html에 삽입 -->
  <div id="calendar">
	  <link rel='stylesheet' href='fullcalendar-3.4.0/fullcalendar.css'/>
	  <script src='fullcalendar-3.4.0/lib/moment.min.js'></script>
	  <script src='fullcalendar-3.4.0/fullcalendar.js'></script>
	  <script src='fullcalendar-3.4.0/locale/ko.js'></script>
	  <script type="text/javascript" src="calendar.js"></script>
	  <div id='calendar'></div>
  </div>
</div>





<!-- 예약하기 modal -->
<div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">예약하기</h4>
      </div>


      <form method="post" action="booking.php" onSubmit="booking_check();" name="booking" class="form-horizontal">
        <div class="modal-body">
          <!--이름 data-->
          <input type="hidden" name="name" value="<?=$_SESSION['name']?>">

          <h4 class="modal-title">시간</h4>
          <div class="row">  
            <div class="col-xs-2">
              <p>예약일</p> 
            </div>
            <div class="col-xs-8">
              <input type="date" value="<?=$default_date?>" name="booking_date" class="form-control">   
            </div>            
          </div>

          <br/>
          <div class="row">
            <div class="col-xs-2">
              <p>시작 / 종료</p> 
            </div>  
  
            <div class="col-xs-4">
              <select name="start_time" class="form-control">
                <option>09:00</option>
                <option>09:30</option>
                <? 
                for ($i=10;$i<22;$i++) {
                  ?><option><?echo "$i:00"?></option><?
                  ?><option><?echo "$i:30"?></option><?
                }?>              
              </select>
            </div>
  
            <div class="col-xs-4">
              <select name="end_time" class="form-control" >
                <option>09:30</option>
                <? 
                  for ($i=10;$i<22;$i++) {
                    ?><option><?echo "$i:00"?></option><?
                    ?><option><?echo "$i:30"?></option><?
                }?>
                <option>22 : 00</option>              
              </select>
            </div>
          </div>
          <br/>


          <h4 class="modal-title">총 인원</h4>
          <div class="col-xs-3">
            <input type="number" class="form-control" name="total_number" value="1" min=1 max="100">
          </div>
          <br/><br/>

          <h4 class="modal-title">용도</h4>
          <div class="radio">
            <label>
              <input type="radio" name="purpose" value="1" checked>
              스터디
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="purpose" value="2">
              비교과
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="purpose" value="3">
              영화 감상
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="purpose" value="4">
            기타
            </label>
          </div>

         
          <h4 class="modal-title">장비</h4>
          <div class="checkbox">
            <label>
              <input type="hidden" name="tool[]" value="">
            </label>
            <label>
              <input type="checkbox" name="tool[]" value="1">
              VR
            </label>
            <label>
              <input type="checkbox" name="tool[]" value="2">
              3D 프린터
            </label>  
            <label>
              <input type="checkbox" name="tool[]" value="3">
              TV
            </label>      
              <label>
              <input type="checkbox" name="tool[]" value="4">
              카메라
            </label>
            <label>
              <input type="checkbox" name="tool[]" value="5">
              프린터
            </label>
            <label>
              <input type="checkbox" name="tool[]" value="6">
              삼성 기어
            </label>
              <label>
              <input type="checkbox" name="tool[]" value="7">
              삼성 360
            </label>
          </div>
          <br/>

          <h4 class="modal-title">기타 사항</h4>
          <input type="text" name="extra" class="form-control" placeholder="활동 목적, 내용 등 기입이 필요하다면 이곳을 활용하세요." maxlength="50">
        </div><!--modal-body-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
          <button type="submit"  onclick="confirm('실습실 예약을 하시겠습니까?');" class="btn btn-primary">예약</button>
        </div>
      </form>

    </div>
  </div>
</div> 




<!-- 상세 예약 정보 modal -->
<div class="modal fade" id="detail_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle">상세 예약 정보</h4>
      </div>

      <div class="modal-body" id="modal_body">
        <h4 class="modal-title">시간</h4>
        <p id="modal_start">07-03 13:00 ~ 07-03 14:00</p>
        <br/>
        <h4 class="modal-title" id="modalEnd">총 인원</h4>
        <p>이재완 포함 5명</p>
        <br/>
        <h4 class="modal-title">용도</h4>
        <p>스터디</p>
        <br/>
        <h4 class="modal-title">장비</h4>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="" checked disabled>
            VR
          </label>
          <label>
            <input type="checkbox" value="" disabled>
            3D 프린터
          </label>  
          <label>
            <input type="checkbox" value="" disabled>
            TV
          </label>      
            <label>
            <input type="checkbox" value="" disabled>
            카메라
          </label>
          <label>
            <input type="checkbox" value="" checked disabled>
            프린터
          </label>
          <label>
            <input type="checkbox" value="" checked disabled>
            삼성 기어
          </label>
          <label>
            <input type="checkbox" value="" disabled>
            삼성 360
          </label>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
        <button type="button" class="btn btn-primary">바로 예약</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>



<script type="text/javascript">
function booking_check(){
  var form = document.booking;
  var special_pattern = /[`~!@#$%^&*|\\\'\";:\/?]/gi;


 
  
}
</script>