<?php
require('top.inc.php');



if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($conn,$_GET['operation']);
		$id=get_safe_value($conn,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update member_details set status='$status' where id='$id'";
		mysqli_query($conn,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql="delete from member_details where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
}


$sql="SELECT member_details.*,hostel.hostel_name FROM member_details,hostel WHERE member_details.id = hostel.id;";
$res=mysqli_query($conn, $sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title"> Member Details </h4>
				   <h4 class="box-link"><a href="roommembersdetails.php">Add member Details</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							<th>ID</th>
							  
							   <th>Hostel Name</th>
							   
							   <th>Room number</th>
							   <th>Member 1 ocupation</th>
							   <th>Member 2 ocupation</th>
							   <th>Member 3 ocupation</th>
							   <th>Member 4 ocupation</th>
							   <th></th>
							   

							 
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_array($res)){?>
							<tr>
							<td><?php echo $row['id']?></td>
							  
							   <td><?php echo $row['hostel_name']?></td>
							   <td><?php echo $row['room_number']?></td>

							   <td><?php echo $row['member_01_ocupation']?></td>
							   <td><?php echo $row['member_02_ocupation']?></td>
							   <td><?php echo $row['member_03_ocupation']?></td>
							   <td><?php echo $row['member_04_ocupation']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
				
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							   
							   
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