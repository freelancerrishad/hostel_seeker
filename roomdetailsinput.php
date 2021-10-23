<?php
require('top.inc.php');
$hostel_id='';
$room_number = '';
$capacity='';
$rent ='';
$no_of_member_present = '';


if(isset($_POST['submit'])){
  $hostel_id = mysqli_real_escape_string($conn, $_POST['id']);
  $hostel_name = mysqli_real_escape_string($conn, $_POST['hostel_name']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
	$no_of_member_present = mysqli_real_escape_string($conn, $_POST['no_of_member_present']);
	$rent = mysqli_real_escape_string($conn, $_POST['rent']);
	
    
        $sql = "INSERT INTO rooms (id,hostel_name,room_number, capacity,no_of_member_present,rent) VALUES ('{$hostel_id}','{$hostel_name}','{$room_number}', '{$capacity}', '{$no_of_member_present}','{$rent}')";
                $result = mysqli_query($conn, $sql);
                header("Location: roomdetails.php");
    
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Hostel Details</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
                     <div class="form-group">
									<label for="categories" class=" form-control-label">Your Hostel Name</label>
									<select class="form-control" name="id">
										<option>Select Your Hostel</option>
										<?php
										$res=mysqli_query($conn,'select id,hostel_name from hostel order by id asc');
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id){
												echo "<option selected value=".$row['id'].$row['hostel_name'].">".$row['id'].">>".$row['hostel_name']."</option>";
											}else{
												echo "<option value=".$row['id'].$row['hostel_name'].">".$row['id'].">>".$row['hostel_name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
							

								<div class="form-group">
									<label for="room_number" class=" form-control-label"> Room_number</label>
									<input type="text" name="room_number" placeholder="Enter room_number" class="form-control" required value="<?php echo $room_number?>">
								</div>
								
								<div class="form-group">
									<label for="capacity" class=" form-control-label">Capacity</label>
									<input type="text" name="capacity" placeholder="Enter capacity " class="form-control" required value="<?php echo $capacity?>">
								</div>
								
								<div class="form-group">
									<label for="no_of_member_present" class=" form-control-label">no_of_member_present</label>
									<input type="text" name="no_of_member_present" placeholder="Enter capacity " class="form-control" required value="<?php echo $no_of_member_present?>">
								</div>

								<div class="form-group">
									<label for="rent" class=" form-control-label">Rent</label>
									<input type="text" name="rent" placeholder="Enter rent " class="form-control" required value="<?php echo $rent?>">
								</div>
							
								
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>