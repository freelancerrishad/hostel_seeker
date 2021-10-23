<?php
session_start();
unset($_SESSION['hostel_owner_login']);
unset($_SESSION['owner_username']);
header('location:index.php');
die();
?>