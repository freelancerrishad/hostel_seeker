<?php

include "connection.inc.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM hostel WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Room Select</title>
    <link rel="stylesheet" type="text/css" href="css/memberpage.css">
  
   
</head>

<body>
    <div class="two">

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM hostel WHERE id = $id";
            $query = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['status'] == 0) {
                echo "<h1 class='sorry'>Sorry this hostel is not avaiable right now</h1>";
            } ?>

            <?php if ($row['status'] == 1) { ?>


                <h1 class="hostel_name">Hostel Name : &nbsp;<?php echo $row['hostel_name'] ?></h1>
                <h1 class="noof"><span class="span">No of rooms in this hostel: &nbsp;</span><?php echo $row['no_of_rooms'] ?></h1>


            <?php } ?>

            <form action="memberdetailsformember.php">
                <?php

                if ($row['status'] == 1) { ?>

                    <label class="chosehostel">Select Room Number For Know members profession</label><br><br><br>
                    <select class="form-control" name="id">

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "select room_number from rooms WHERE id = $id";
                            $query = mysqli_query($conn, $sql);


                            echo "<option>Select Room Number</option>";

                            while ($row = mysqli_fetch_assoc($query)) {

                                if ($row['id'] == $id) {
                                    echo "<option selected value=$id>" . $row['room_number'] . "</option>";
                                } else {
                                    echo "<option value=$id>" . $row['room_number'] . "</option>";
                                }
                            }
                        }
                        ?>


                    </select>
                    <br><br>

                    <button class="btn">Show Member Details</button>
                <?php }  ?>

            </form>

        <?php }  ?>
        <?php }  ?>

       
     

    </div>
    <br><br><br>

  
    
</body>

</html>