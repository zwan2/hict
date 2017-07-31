<?php
    include 'main.html';
    echo $_SESSION['member_code'];
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

      <div class="modal-body">
        <form>
          <h4 class="modal-title">시간</h4>
          
          <div class="row">  
            <div class="col-xs-2">
              <p>시작</p> 
            </div>
            <div class="col-xs-6">
              <input type="date" class="form-control">   
            </div>

            <div class="col-xs-4">
              <select class="form-control">
                <? 
                  for ($i=9;$i<22;$i++) {
                    ?><option><?echo "$i : 00"?></option><?
                    ?><option><?echo "$i : 30"?></option><?
                }?>              
              </select>
            </div>

          </div>

          <br/>
          <div class="row">
            <div class="col-xs-2">
              <p>종료</p> 
            </div>  
            <div class="col-xs-6">
              <input type="date" class="form-control">
            </div>
            <div class="col-xs-4">
              <select class="form-control">
                <option>9 : 30</option>
                <? 
                  for ($i=10;$i<22;$i++) {
                    ?><option><?echo "$i : 00"?></option><?
                    ?><option><?echo "$i : 30"?></option><?
                }?>
                <option>22 : 00</option>              
              </select>
            </div>
          </div>
          <br/>




          <h4 class="modal-title">총 인원</h4>
          <div class="col-xs-3">
            <input type="number" class="form-control" id="total_number" min=1 max="100">
          </div>
          <br/><br/>

          <h4 class="modal-title">용도</h4>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
              스터디
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
              비교과
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
              영화 감상
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios4" value="option3">
            기타
            </label>
          </div>

         


          <h4 class="modal-title">장비</h4>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              VR
            </label>
            <label>
              <input type="checkbox" value="">
              3D 프린터
            </label>  
            <label>
              <input type="checkbox" value="">
              TV
            </label>      
              <label>
              <input type="checkbox" value="">
              카메라
            </label>
            <label>
              <input type="checkbox" value="">
              프린터
            </label>
            <label>
              <input type="checkbox" value="">
              삼성 기어
            </label>
              <label>
              <input type="checkbox" value="">
              삼성 360
            </label>
          </div>
          <h4 class="modal-title">기타 사항</h4>
          <input type="text" class="form-control" maxlength="50">
        </form>
      </div>

      


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
        <button type="button" class="btn btn-primary">예약</button>
      </div>
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


