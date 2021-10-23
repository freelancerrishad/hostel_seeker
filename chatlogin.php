<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($conn,$_POST['username']);
	$password=get_safe_value($conn,$_POST['password']);
	$sql="select * from members where member_username = '$username' and member_pass='$password'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['members']='yes';
		$_SESSION['member_username']=$username;
		header('location:chatuser.php?username='.$username);
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/memberlogin.css">
   </head>
   <body class="bg-dark">
      <div class="member-login">
         <div class="container">
            <div class="login-content">
               <h1 class="heading">Member Login </h1>
               <div class="heading-border"></div>
               <div class="login-form">
                  <form method="post">
                     <div class="form-group">
                        <label class="username">Username</label>
                        <input type="text" name="username"  class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn">Log in</button>
					</form>
              
               </div>
               <h1 style="text-align: center;" class="messagehead">Not a user Register here : <a href="index.php" style="color:blue">Register</a></h1>
					<div class="field_error"><?php echo $msg?></div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>