<?php
include 'main.html';
$today = date("Y-m-d");
$next_day = strtotime($today."+1 day");
$default_date = date("Y-m-d", $next_day);
?>
<div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">예약하기</h4>
</div>
<form method="post" action="booking.php" onsubmit="return booking_check()" name="booking" class="form-horizontal">
<div class="modal-body">
<input type="hidden" name="name" value="<?=$_SESSION['name']?>">
<input type="hidden" name="student_number" value="<?=$_SESSION['student_number']?>">
<h4 class="modal-title">시간</h4>
<div class="row">
<div class="col-xs-4">
<p>예약일</p>
</div>
<div class="col-xs-8">
<input type="date" value="<?=$default_date?>" name="booking_date" class="form-control input_radius">
</div>
</div>
<br/>
<div class="row">
<div class="col-xs-4">
<p>시작 / 종료</p>
</div>
<div class="col-xs-4">
<select name="start_time" class="form-control input_radius">
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
<select name="end_time" class="form-control input_radius">
<option>09:30</option>
<? 
                  for ($i=10;$i<22;$i++) {
                    ?><option><?echo "$i:00"?></option><?
                    ?><option><?echo "$i:30"?></option><?
                }?>
<option>22:00</option>
</select>
</div>
</div>
<br/>
<h4 class="modal-title">총 인원</h4>
<input type="number" class="form-control input_radius" name="total_number" value="1" min="1" max="99">
<br/><br/>
<h4 class="modal-title">용도</h4>
<div class="radio">
<label>
<input type="radio" name="purpose" value="스터디" checked>
스터디
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="purpose" value="비교과">
비교과
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="purpose" value="영화 감상">
영화 감상
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="purpose" value="기타">
기타
</label>
</div>
<br/>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          장비 목록
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <strong>카메라</strong></br> 
      <small>Sony DSC-HX400V*2, Canon EOS 5D MARK IV*3, Samsung Gear 360*3, 삼각대*2, 백팩*1</small><br/>
        <strong>VR</strong><br/> 
        <small>HTC VIVE*4, DK2 oculus*5, GEAR VR*5</small><br/>
        <strong>3D PRINTER</strong><br/> 
        <small>3DISON AEP*1, Infitary*1, CreMaker*1</small><br/>
        <strong>기타</strong></br>
        <small>데스크탑 PC*8, LED TV*1, 책상*38, 빔 프로젝터*1, 스피커*1, 미니 냉장고*1</small>
      </div>
    </div>
  </div>
</div>
<h4 class="modal-title">장비</h4>
<input type="text" id="input_tool" name="tool" class="form-control input_radius" placeholder="이용할 장비를 모두 기입하세요" maxlength="100">

<br/><br/>
<h4 class="modal-title">기타 사항</h4>
<input type="text" id="input_extra" name="extra" class="form-control input_radius" placeholder="활동 목적, 내용 등 기입이 필요한 경우 입력하세요." maxlength="100">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
<button type="submit" onclick="return confirm('실습실 예약을 하시겠습니까?')" class="btn btn-primary">예약</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="detail_data">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="modal-title">상세 예약 정보</h4>
</div>
<div class="modal-body">
<h4 class="modal-title">시간</h4>
<span id="start"></span> -
<span id="end"></span>
<br/><br/>
<h4 class="modal-title" id="modalEnd">총 인원</h4>
<mark id="name"></mark> 포함 <span id="total_number"></span>명
<br/><br/>
<h4 class="modal-title">용도</h4>
<p id="purpose"></p>
<br/>
<h4 class="modal-title">장비</h4>
<div id="tool">
</div>
<br/>
<h4 class="modal-title">기타 사항</h4>
<p id="extra"></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
</div>
</div>
</div>
</div>
<div class="container">
<div class="col-xs-12 col-sm-8 col-sm-offset-2 no_padding">
<button type="button" class="btn btn-primary btn-lg btn-block" id="booking_button" data-toggle="modal" data-target="#booking">
<inline id="booking_text">예약하기</inline><i class="material-icons" id="booking_icon">event_available</i>
</button>
</div>
</div>
<div class="container">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.0/fullcalendar.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.0/locale/ko.js'></script>
<script type="text/javascript" src="calendar.js"></script>

<div id='calendar'></div>
<br/>
<div class="float_right">
<inline class="grey">
<strong>　● 대기</strong>
</inline>
<inline class="blue">
<strong>　● 승인</strong> 
</inline>
<inline class="red">
<strong>　● 거절</strong>
</inline>
</div>
<br/>
<div class="float_right">
<inline class="blue_opacity">
<strong>■ 상주</strong>
</inline>
<inline class="red_opacity">
<strong>　■ 수업</strong>
</inline>
</div>
</div>
<script type="text/javascript">

function booking_check(){
  var form = document.booking;  
  
  //날짜 제한
  if(form.booking_date.value <= moment().format("YYYY-MM-DD")) {
    alert("예약일을 올바르게 입력하세요.");
    form.booking_date.focus();
    return false;
  }

  //시간 제한
  else if(form.start_time.value >= form.end_time.value) {
    alert("시간을 올바르게 입력하세요.");
    form.end_time.focus();
    return false;
  }

  //특수문자 처리

  $("#input_tool").bind("keyup",function(){
    re = /[~!@\#$%^&*\()\-=+_']/gi; 
    var temp=$("#input_tool").val();
    if(re.test(temp)){ //특수문자가 포함되면 삭제하여 값으로 다시셋팅
      $("#input_tool").val(temp.replace(re,"")); 
    } 
  });
  $("#input_extra").bind("keyup",function(){
    re = /[~!@\#$%^&*\()\-=+_']/gi; 
    var temp=$("#input_extra").val();
    if(re.test(temp)){
      $("#input_extra").val(temp.replace(re,"")); 
    } 
  });


}
</script>

<?php
include 'footer.html';
?>