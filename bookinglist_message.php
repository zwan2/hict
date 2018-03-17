<?php
include 'function.php';

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $query = "SELECT booking_id, admin_name, admin_tel, booking_state, message FROM booking WHERE booking_id = $id";
 
  if($result = $db->query($query)) {
    //로그인 성공
    while($row = $result->fetch_assoc()) {
      $booking_id = $row['booking_id'];
      $admin_name = $row['admin_name'];
      $admin_tel = $row['admin_tel'];
      $booking_state = $row['booking_state'];
      $message = $row['message'];
     



      if ($admin_name!="") {
        echo"<p>담당자: $admin_name ($admin_tel)</p>";
      }
      ?>
      <label class="radio-inline">
        <input type="radio" name="booking_state" value = "1" <?if($booking_state==1) echo"checked" ?>> 승인
      </label>
      <label class="radio-inline">
        <input type="radio" name="booking_state" value = "2" <?if($booking_state==2) echo"checked" ?>> 거절
      </label>
      <br/><br/>

      <h4 class="modal-title">전달 사항(선택)</h4>
      <input type="text" class="form-control" name="message" value="<?=$message?>">

      <input type="hidden" name="booking_id" value="<?=$booking_id?>">
      <input type="hidden" name="admin_tel" value="<?=$admin_tel?>">
      <input type="hidden" name="admin_name" value="<?=$admin_name?>">

      <?
    }
  }

}
?>

     