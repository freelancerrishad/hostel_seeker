<?php
$conn=mysqli_connect("localhost","root","","hostel_seeker");

function formatDate($date){
    return date('g:i a',strtotime($date));
  }

?>
