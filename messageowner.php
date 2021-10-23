<?php

    include 'connection.inc.php';

    error_reporting(0);
    $username = $_GET['username'];
    
    $id = $_GET['member_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat With Member</title>
    <!-- external stylesheets -->
    <link rel="stylesheet" href="asset/css/chats.css">
    <link rel="stylesheet" href="asset/css/message.css">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Wassup</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="chatuser.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php
        $getUser = "SELECT * FROM hostel WHERE owner_username = '$username'";
        $getUserStatus = mysqli_query($conn,$getUser) or die(mysqli_error($conn));
        $getUserRow = mysqli_fetch_assoc($getUserStatus);
      ?>
      
  </div>
</nav>
    <div class="container">
        <?php
            $getReceiver = "SELECT * FROM members WHERE member_username = '$id'";
            $getReceiverStatus = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
            $getReceiverRow = mysqli_fetch_assoc($getReceiverStatus);
            $received_by = $getReceiverRow['id'];
        ?>
        <div class="card mt-4">
           
            <?php
                $getMessage = "SELECT * FROM messages2 WHERE sent_by = '$username' AND received_by = '$id' OR sent_by = '$username' AND received_by = '$id' ORDER BY createdAt asc";
                $getMessageStatus = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
                if(mysqli_num_rows($getMessageStatus) > 0) {
                    while($getMessageRow = mysqli_fetch_assoc($getMessageStatus)) {
                        $message_id = $getMessageRow['id'];
            ?>
            <div class="card-body">
            <h6 style = "color: #007bff"><?=$getMessageRow['sent_by']?></h6>
                <div class="message-box ml-4">    
                    <p class="text-center"><?=$getMessageRow['message']?></p>
                </div>
                <?php
                    } 
                
                } else {
            ?>
            <div class="card-body">
                    <p class = "text-muted">No messages yet! Say 'Hi'</p>
            </div>
            <?php
                }
            ?>
               
            </div>
            <?php
                $getMessage = "SELECT * FROM messages WHERE sent_by = '$username' AND received_by = '$id' OR sent_by = '$username' AND received_by = '$id' ORDER BY createdAt asc";
                $getMessageStatus = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
                if(mysqli_num_rows($getMessageStatus) > 0) {
                    while($getMessageRow = mysqli_fetch_assoc($getMessageStatus)) {
                        $message_id = $getMessageRow['id'];
            ?>
             <div class="card-body">
            <h6 style = "color: #007bff"><?=$getMessageRow['sent_by']?></h6>
                <div class="message-box ml-4">    
                    <p class="text-center"><?=$getMessageRow['message']?></p>
                </div>
               
               
            </div>
            
            <?php
                    } 
                
                } else {
            ?>
            <div class="card-body">
                    <p class = "text-muted">No messages yet! Say 'Hi'</p>
            </div>
            <?php
                }
            ?>
            
            <div class="card-footer text-center">
            <form action="sendowner.php" method = "POST" style = "display: inline-block">
            <input type="hidden" name = "sent_by" value = "<?=$username?>"/>
            <input type="hidden" name = "received_by" value = "<?=$id?>"/>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name = "message" id = "message" class="form-control" placeholder = "Type your message here" required/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            
                            <div class="form-group">
									
									<input type="file" name="image" placeholder="Enter image " class="form-control" multiple>
								</div>
                           
                        </div>
                        
                        <div class="col-md-2">
                            <button type = "submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

 <!-- Bootstrap scripts -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>