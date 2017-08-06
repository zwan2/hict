<?php

$db = mysqli_connect("localhost", "root", "autoset", "hict");

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $query = "SELECT * FROM booking WHERE booking_id = $id";
 
  if($result = $db->query($query)) {
    while($row = $result->fetch_assoc()) {
      $start_time = date("Y-m-d G:i", strtotime($row['start_time']));
      $end_time = date("G:i", strtotime($row['end_time']));
      ?>

      <h4 class="modal-title">시간</h4>
      <span id="start"><?=$start_time?></span> -  
      <span id="end"><?=$end_time?></span>
      <br/><br/>


      <h4 class="modal-title" id="modalEnd">총 인원</h4>
      <span id="name"><?=$row['name']?></span> 포함 <span id="total_number"><?=$row['total_number']?></span>명
      <br/><br/>

      <h4 class="modal-title">용도</h4>
      <p id="purpose"><?=$row['purpose']?></p>
      <br/>

      <h4 class="modal-title">장비</h4>
      <div id="tool"><?=$row['tool']?></div>
      <br/>

      <h4 class="modal-title">기타 사항</h4>
      <span id="extra"><?=$row['extra']?></span>

      <?

    }
  }

}
?>