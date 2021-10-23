<?php
require('top.inc.php');



$sql='SELECT rooms.*,hostel.hostel_name FROM rooms, hostel WHERE rooms.id = hostel.id';
$res=mysqli_query($conn, $sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title"> Room Details </h4>
				   <h4 class="box-link"><a href="roomdetailsinput.php">Add room Details</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							 
							  
							   <th>Hostel Name</th>
							   
							   <th>Room number</th>
							   <th>Capacity</th>
							   <th>no_of_member_present</th>
							   <th>Rent Per Person</th>
							   

							 
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_array($res)){?>
							<tr>
							  
							  
							   <td><?php echo $row['hostel_name']?></td>

							   <td><?php echo $row['room_number']?></td>
							   <td><?php echo $row['capacity']?></td>
							   <td><?php echo $row['no_of_member_present']?></td>
							   <td><?php echo $row['rent']?></td>
							  
							   
							   
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>