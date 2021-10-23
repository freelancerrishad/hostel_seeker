<?php
include 'connection.inc.php';
$sql = 'select * from hostel';
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Hostel Choice</title>
    <link rel="stylesheet" type="text/css" href="css/memberpage.css">
</head>

<body>
    <div class="one">
        <a href="memberindex.php">
            <h1 class="index">GO TO HOME</h1>
        </a>
        <div class="hostelname">
                <form action="memberroomselect.php">
                <label class="chosehostel">Chose your hostel name</label><br><br><br>        
                <select class="form-control" name="id">
                    <option>Select Your Hostel</option>
                    <?php
                    $res = mysqli_query($conn, 'select id,hostel_name from hostel order by id asc');
                    
                    while ($row = mysqli_fetch_assoc($res)) {
                       
                        if ($row['id'] == $id) {
                            echo "<option selected value=" .$row['id'].">" . $row['id'] . "---" . $row['hostel_name'] . "</option>";
                        } else {
                            echo "<option value=" . $row['id'].">" . $row['id'] . "---" . $row['hostel_name'] . "</option>";
                        }
                    }
                
                    ?>

                </select>
                <br><br>

                <button class="btn">Show Hostel Details</button>
                </form>

                <h2 style="color:springgreen; font-size: 80px;">Wanna Chat with hostel owner......</h2>
        <a href="chatlogin.php" target="blank"><button class="btn">Click Here</button></a>
      

            
        </div>
    </div>
</body>

</html>