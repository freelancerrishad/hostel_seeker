
<?php

require('top.inc.php');
$owner_username='';
$id = '';
$hostel_name='';
$hostel_area='';
$no_of_rooms='';
$image='';
$short_descript='';
$descript='';

$msg='';
$image_required='required';


		if($_FILES['image']['name']!=''){
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],$image);
				}
				
		
	




if(isset($_POST['submit'])){
    $owner_username = mysqli_real_escape_string($conn, $_POST['owner_username']);
 
    $hostel_name = mysqli_real_escape_string($conn, $_POST['hostel_name']);
	$hostel_area = mysqli_real_escape_string($conn, $_POST['hostel_area']);
	$no_of_rooms = mysqli_real_escape_string($conn, $_POST['no_of_rooms']);
	$short_descript = mysqli_real_escape_string($conn, $_POST['short_descript']);
	$descript = mysqli_real_escape_string($conn, $_POST['descript']);
	
   
    
        $sql = "INSERT INTO hostel (owner_username,hostel_name,hostel_area,no_of_rooms,image,short_descript,descript,status) VALUES ('{$owner_username}','{$hostel_name}','{$hostel_area}','{$no_of_rooms}','{$image}','{$short_descript}','{$descript}',1)";
                $result = mysqli_query($conn, $sql);
                header("Location: hosteldetails.php");
    
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
									<label for="categories" class=" form-control-label">Your Username</label>
									<select class="form-control" name="owner_username">
										<option>Select Your Username</option>
										<?php
										$res=mysqli_query($conn,"select owner_username from hostel_owner order by owner_username asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id){
												echo "<option selected value=".$row['owner_username'].">".$row['owner_username']."</option>";
											}else{
												echo "<option value=".$row['owner_username'].">".$row['owner_username']."</option>";
											}
											
										}
										?>
									</select>
								</div>
							   
							<div class="form-group">
									<label for="hostel_name" class=" form-control-label">hostel_name </label>
									<input type="text" name="hostel_name" placeholder="Enter hostel_name" class="form-control" required value="<?php echo $hostel_name?>">
								</div>

								<div class="form-group">
									<label for="hostel_area" class=" form-control-label"> hostel_area</label>
									<input type="text" name="hostel_area" placeholder="Enter hostel_area" class="form-control" required value="<?php echo $hostel_area?>">
								</div>
								
								<div class="form-group">
									<label for="no_of_rooms" class=" form-control-label">no_of_rooms</label>
									<input type="text" name="no_of_rooms" placeholder="Enter no_of_rooms " class="form-control" required value="<?php echo $no_of_rooms?>">
								</div>

								<div class="form-group">
									<label for="image" class=" form-control-label">image</label>
									<input type="file" name="image" placeholder="Enter image " class="form-control" required value="<?php echo $image?>">
								</div>
							
								
								<div class="form-group">
									<label for="short_descript" class=" form-control-label">short_descript</label>
									<input type="text" name="short_descript" placeholder="Enter short_descript " class="form-control" required value="<?php echo $short_descript?>">
								</div>

								<div class="form-group">
									<label for="descript" class=" form-control-label">descript</label>
									<input type="text" name="descript" placeholder="Enter descript " class="form-control" required value="<?php echo $descript?>">
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