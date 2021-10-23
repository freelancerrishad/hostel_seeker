<?php

include "connection.inc.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM member_details WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/memberpage.css">
</head>
<body>
    <div class="three">
    <a href="memberindex.php">
            <h1 class="index">GO BACK TO HOME</h1>
           
        </a>
        <a href="memberpage.php">
        <h1 class="index">GO BACK TO MEMBER PAGE</h1><br><br><br><br>
           
        </a>
        
<?php

while ($row = mysqli_fetch_array($query)) { ?>
<h1 class="chosehostel">See all members details under <span class="span"><?php echo $row['room_number'] ?></span> room </h1>
    <h1 class="noof">Member_01_ocupation: &nbsp;<span class="span"><?php echo $row['member_01_ocupation'] ?></span></h1>
    <h1 class="noof">Member_02_ocupation: &nbsp;<span class="span"><?php echo $row['member_02_ocupation'] ?></span></h1>
    <h1 class="noof">Member_03_ocupation: &nbsp;<span class="span"><?php echo $row['member_03_ocupation'] ?></span></h1>
    <h1 class="noof">Member_04_ocupation: &nbsp;<span class="span"><?php echo $row['member_04_ocupation'] ?></span></h1>
   

<?php } ?>
</div>
</body>
</html>