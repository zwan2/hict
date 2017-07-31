<?
    include 'main.html';
    include 'function.php';
?>
<div class="container">
  <div class="panel panel-default">
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
        <td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
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
      	<td><p class="text-muted">승인 대기</p><u onclick="confirm('정말 예약을 취소하시겠습니까?');">취소</u></td>



      </tr>

      <tr>
        <td>1</td>
        <td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
       
        <td><u data-toggle="modal" data-target="#message">거절</p></td>
   
      </tr>    
    </table>
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

      <!--MODAL-->
      <div class="modal-body" id="modalBody">
        <h4 class="modal-title">시간</h4>
        <p>07-03 13:00 ~ 07-03 14:00</p>
        <br/>
        <h4 class="modal-title">총 인원</h4>
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


</body>
</html>