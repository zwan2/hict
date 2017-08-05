<?php
include 'main.html';

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
        <span id="start"></span> -  
        <span id="end"></span>
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


<!-- 전달사항(승인, 거절) modal -->
<div class="modal fade bs-example-modal-sm" id="message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">전달 사항</h4>
      </div>


      <div class="modal-body">
        <p>죄송합니다 ㅠㅠ</p>
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

    <!-- Default panel contents -->
    <div class="panel-heading">내 예약</div>


    <table class="table">
      <tr>
        <th>#</th>
      	<th>날짜</th>
      	<th>상태</th>

      </tr>
      
      <tr>
        <td>4</td>
        <td> <a data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
        <td><p class="text-muted">취소</p></td>
      </tr>



      <tr>
        <td>3</td>
      	<td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
      	<td><u data-toggle="modal" data-target="#message">승인</p></td>

      </tr>
      <tr>
        <td>2</td>
        <td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
      	<td><p class="text-muted">승인 대기</p><u onclick="return confirm('실습실 예약을 취소하시겠습니까?');>취소</u></td>



      </tr>

      <tr>
        <td>1</td>
        <td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
       
        <td><u data-toggle="modal" data-target="#message">거절</p></td>
   
      </tr>    
    </table>
  </div>
</div>



</body>
</html>

<script>
$(document).ready(function(){

    $(document).on('click', '#detail_data', function(e){
  
     e.preventDefault();
  
     var booking_id = $(this).data('id'); // get id of clicked row
  
     $('#start').html(''); // leave this div blank
     $('#modal-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'getuser.php',
          type: 'POST',
          data: 'id='+booking_id,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#start').html(''); // blank before load.
          $('#start').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#start').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

    });
});
</script>
