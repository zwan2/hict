<?php
	
$today = date("Y-m-d");
$next_day = strtotime($today."+1 day");
$default_date = date("Y-m-d", $next_day);


?>