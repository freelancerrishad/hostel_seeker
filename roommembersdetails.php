<?php
require('top.inc.php');
$hostel_id='';
$room_number = '';
$member_01_ocupation='';
$member_02_ocupation='';
$member_03_ocupation='';
$member_04_ocupation='';


if(isset($_POST['submit'])){
  $hostel_id = mysqli_real_escape_string($conn, $_POST['id']);
  $hostel_name = mysqli_real_escape_string($conn, $_POST['hostel_name']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $member_01_ocupation = mysqli_real_escape_string($conn, $_POST['member_01_ocupation']);
    $member_02_ocupation = mysqli_real_escape_string($conn, $_POST['member_02_ocupation']);
    $member_03_ocupation = mysqli_real_escape_string($conn, $_POST['member_03_ocupation']);
    $member_04_ocupation = mysqli_real_escape_string($conn, $_POST['member_04_ocupation']);
   
    
        $sql = "INSERT INTO member_details (id,hostel_name,room_number,member_01_ocupation,member_02_ocupation,member_03_ocupation,member_04_ocupation,status) VALUES ('{$hostel_id}','{$hostel_name}','{$room_number}','{$member_01_ocupation}','{$member_02_ocupation}','{$member_03_ocupation}','{$member_04_ocupation}',1)";
                $result = mysqli_query($conn, $sql);
                header("Location: roommembers.php");
    
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Room details</strong><small> Form</small></div>
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
									<label for="member_01_ocupation" class=" form-control-label">member_01_ocupation</label>
									<input type="text" name="member_01_ocupation" placeholder="Enter member_01_ocupation " class="form-control"  value="<?php echo $member_01_ocupation?>">
								</div>
                        <div class="form-group">
									<label for="member_02_ocupation" class=" form-control-label">member_02_ocupation</label>
									<input type="text" name="member_02_ocupation" placeholder="Enter member_02_ocupation " class="form-control"  value="<?php echo $member_02_ocupation?>">
								</div>
                        <div class="form-group">
									<label for="member_03_ocupation" class=" form-control-label">member_03_ocupation</label>
									<input type="text" name="member_03_ocupation" placeholder="Enter member_03_ocupation " class="form-control"  value="<?php echo $member_03_ocupation?>">
								</div>
                        <div class="form-group">
									<label for="member_04_ocupation" class=" form-control-label">member_04_ocupation</label>
									<input type="text" name="member_04_ocupation" placeholder="Enter member_04_ocupation " class="form-control"  value="<?php echo $member_04_ocupation?>">
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