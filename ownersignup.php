<?php
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: index.php");
    }

    if (isset($_POST["submit"])) {
        include 'connection.inc.php';

        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $hostel_name = mysqli_real_escape_string($conn, $_POST["hostel_name"]);
        $mobile_num = mysqli_real_escape_string($conn, $_POST["mobile_num"]);
        $hostel_area = mysqli_real_escape_string($conn, $_POST["hostel_area"]);
        $nid = mysqli_real_escape_string($conn, $_POST["nid"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hostel_owner WHERE email_address='{$email}'")) > 0) {
            echo "<script>alert('{$email} - This email has already taken.');</script>";
        }
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hostel_owner WHERE owner_username='{$username}'")) > 0) {
          echo '<h2 style="color: red;">sorry, this username is already taken</h2>';
      }
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hostel_owner WHERE owner_NID='{$nid}'")) > 0) {
        echo '<h2 style="color: red;">sorry, this NID is already taken</h2>';
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hostel_owner WHERE owner_number='{$mobile_num}'")) > 0) {
      echo '<h2 style="color: red;">sorry, this mobile number is already taken</h2>';
  }

        else {
            
                $sql = "INSERT INTO hostel_owner (owner_username, owner_name,email_address,owner_pass,owner_number,owner_NID,address) VALUES ('{$username}', '{$name}','{$email}','{$password}','{$mobile_num}','{$nid}','{$address}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                   echo "<script>alert('your signup successfull.');</script>";
                    header("Location: index.php");
                }else {
                    echo "error";
                }
            
            }
        }
    
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Owner signup</title>
    <link rel="stylesheet" type="text/css" href="css/ownersignup.css">
  </head>
  <body>
    <div>

    </div>
    <div class="home">
      <h1><a href="index.php">Back To Home</a></h1>
    </div>
    <div class="member_signup_container">
      <div class="member_signup_header">
        <h2>Owner Registration Form</h2>
      </div>
      <form class="member_form" action="ownersignup.php" method="post">
        
        <div class="input-form">
          <label for="username" class="username">Username:</label>
          <input type="username" name="username" id="username" class="input" placeholder="Enter a username" required>
        </div>
        <div>
        <label for="name" class="name">Name:</label>
          <input type="name" name="name" id="name" class="input" placeholder="Enter your full name" required>
        </div>
        
        <div>
        <label for="mobile_num" class="mobile_num">Mobile_num:</label>
          <input type="mobile_num" name="mobile_num" id="mobile_num" class="input" placeholder="Enter your mobile_num" required>
        </div>
       
        <div>
        <label for="nid" class="nid">NID:</label>
          <input type="nid" name="nid" id="nid" class="input" placeholder="Enter your nid" required>
        </div>
        <div>
        <label for="email" class="email">Email:</label>
          <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
          
        </div>
        <div>
        <label for="password" class="password">Password:</label>
          <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
        </div>
      
        <div>
        <label for="address" class="address">Address:</label>
          <input type="address" name="address" id="address" class="input" placeholder="Enter your address" required>
        </div>
        <button type="submit" name="submit">Submit</button>
        <div class="already">Already a user &nbsp;&nbsp; <a href="index.php">LogIn</a></div>
      </form>
    </div>
  </body>
</html>
