<?php
    include 'connection.inc.php';
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- external stylesheets -->
    <link rel="stylesheet" href="asset/css/chats.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Chat With owner</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./chats.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./logout.php">Logout</a>
      </li>
      <?php
        $getUser = "SELECT * FROM members WHERE member_username = '$username'";
        $getUserStatus = mysqli_query($conn,$getUser) or die(mysqli_error($conn));
        $getUserRow = mysqli_fetch_assoc($getUserStatus);
      ?>
     
  </div>
</nav>

    <!-- chats section -->
    <div class="container mt-4">
      <div class="card">
        <div class="card-title text-center">
          
          <form class="form-inline mt-4" method="POST" style = "display : inline-block">

        <input class="form-control mr-sm-2" type="search" name="str"  placeholder="search">
        <br><br><br>
        <input type="submit" name="submit" value="Search Now" class="btn btn-outline-success my-2 my-sm-0">
      </form>

          <?php

if (isset($_POST['submit'])) {
  $str = mysqli_real_escape_string($conn, $_POST['str']);
  $sql1 = "select * from hostel where hostel_name like '%$str%' or hostel_area like '%$str%' or short_descript like '%$str%' or descript like '%$str%' or no_of_rooms like '%$str%'";
  $res = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo "<span style='color:white; font-size: 40px'>Your search result: &nbsp;&nbsp;</span>";
      echo "<a href='message.php?username=".$username."&&id=".$row['id']."'>".$row['hostel_name'];
     
      echo '<br>';
      
    
    }
  } else {
    echo 'no data found';
  }
}
?>
        </div>
        <div class="card-body mb-4">
          <h1>Chose Hostel Name to message</h1>
          <?php 
            $sql = 'select * from hostel';
            $res = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res)){
              echo "<h3><a href='message.php?username=".$username."&&id=".$row['owner_username']."'>".$row['hostel_name'];
              echo "<br>";
            }
          ?>
         
          
         
           
         
        </div>
      </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>