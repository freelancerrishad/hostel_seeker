<?php
include 'connection.inc.php';
$sql = 'select * from hostel';
$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title></title>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  
</head>

<body>

  <header>
    <div class="custom-shape-divider-bottom-1631343272">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
      </svg>
    </div>
    <div class="mainheader">
      <div class="menu">
        <ul>
          <a href="index.php">
            <li class="home">Home</li>
          </a>
          <a href="#container">
            <li class="about">About Us</li>
          </a>
          <a href="#blog">
            <li class="hostel">Hostel Description</li>
          </a>
          <a href="#contact">
            <li class="hostel">Contact Us</li>
          </a>
        </ul>
      </div>
      <div class="border1"></div>
      <div class="login1">
              <a href="memberpage.php"><button  class="login" id="login">Member Page</button></a>
              <a href="logout.php"><button class="signup" id="signup">LogOut</button></a>
      </div>
    </div>


    <div class="middleborder"></div>

    <div class="popup1" id="popup-2">
      <div class="option">
        <div class="content1">
          <div class="close-btn1">
            +
          </div>
          <h2>Choose Your Option</h2>
          <a href="memberlogin.php"><button type="button" name="member" class="memberlogin">I am a member</button></a>
          <a href="ownerlogin.php"><button type="button" name="owner" class="ownerlogin">I am hostel owner</button></a>
        </div>
      </div>
    </div>

    <div class="popup" id="popup-1">
      <div class="overlay">
        <div class="content">
          <div class="close-btn">
            +
          </div>
          <h2>Choose Your Option</h2>
          <a href="membersignup.php"><button type="button" name="member" class="member">Sign Up as member</button></a>
          <a href="ownersignup.php"><button type="button" name="owner" class="owner">Signup as a hostel owner</button></a>
        </div>
      </div>
    </div>
    <div class="middleheader">
      <h2>Check For Your Hostel Area</h2>
      <form class="form_area" method="POST">

        <input type="search" name="str" class="sea" placeholder="search your hostel">
        <br><br><br>
        <input type="submit" name="submit" value="Search Now" class="submit">
      </form>
     <br>
      <div style="background-color: rgba(0,0,0,0.7); font-size: 30px; color:blue;  border-radius: 15px;">
      <?php

      if (isset($_POST['submit'])) {
        $str = mysqli_real_escape_string($conn, $_POST['str']);
        $sql1 = "select * from hostel where hostel_name like '%$str%' or hostel_area like '%$str%' or short_descript like '%$str%' or descript like '%$str%' or no_of_rooms like '%$str%'";
        $res = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            echo "<span style='color:white; font-size: 40px'>Your search result: &nbsp;&nbsp;</span>";
            echo "<a href='view.php?id=".$row['id']."'>".$row['hostel_name'];
           
            echo '<br>';
            
          
          }
        } else {
          echo 'no data found';
        }
      }
      ?>
      </div>
    </div>
  </header>

  <section id="blog">
    <div class="row">
      <?php foreach ($query as $q) { ?>
        <?php if ($q['status'] == 1) { ?>
          <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="card text-white bg-dark mt-5" style="width: 18rem;">
              <div class="card-body" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url(<?php echo $q['image']; ?>);   background-position: center; background-repeat: no-repeat; background-size: cover; overflow: hidden; text-align: center; color: white;">
            

                <h5 class="card-title"><?php echo $q['hostel_name']; ?></h5>
                <p class="card-text"><?php echo substr($q['short_descript'], 0, 50); ?>...</p>
                <a href="view.php?id=<?php echo $q['id'] ?>" class="btn btn-light">Read More <span class="text-danger">&rarr;</span></a>
              <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>

  </section>
  <br><br><br><br>
<section id="contact">
  <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h2 class="text-center py-2"> Contact Us </h2>
                        <hr>
                        <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Please Fill in the Blanks ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Your Message Has Been Sent ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }
                        
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder="User Name" class="form-control mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
                            <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">
                            <textarea name="msg" class="form-control mb-2" placeholder="Write The Message"></textarea>
                            <button class="btn btn-success" name="btn-send"> Send </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <br><br><br><br>
    <section id="container">
    <div class="aboutus">
      <div class="des">
        <p>Hostel means a buffet of memories. In this Dhaka city too, many students come from the local area. These students want a good environment for study and also want a safe living place. So, it's a very tough situation to find a good hostel in a short time. For this reason, we develop this website which is helpful for students searching for their hostel.</p>
      </div>
      <div class="image">
        <img src="images/logo.jpg" height="400px" width="500px">
      </div>
    </div>
  </section>


  <footer>
    <div class="rishad">
      rishad
    </div>
  </footer>
  <script type="text/javascript" src="javascript/popup.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>