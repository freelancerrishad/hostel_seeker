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
		$update_status_sql="update hostel set status='$status' where id='$id'";
		mysqli_query($conn,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql="delete from hostel where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
	
}
$sql = 'SELECT hostel.*,hostel_owner.owner_name FROM hostel,hostel_owner WHERE hostel.owner_username = hostel_owner.owner_username';
#$sql="select * from hostel order by id asc";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Hostel Details </h4>
				   <h4 class="box-link"><a href="hosteldetailsinput.php">Add hostel details</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">Serial</th>
							   <th>ID</th>
							  <th>Hostel Name</th>
							  <th>Image</th>
							  <th>Hostel Area</th>
							  <th>No of rooms</th>
							  <th>short description</th>
							  <th>Description</th>
							  <th>Owner Name</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							<td class="serial"><?php echo $i=$i+1?></td>
							   <td><?php echo $row['id']?></td>
							 
							   <td><?php echo $row['hostel_name']?></td>
							   <td><img src="<?php echo 'SELECT image from hostel .$row["image"]'?>"/></td>
							   <td><?php echo $row['hostel_area']?></td>
							   <td><?php echo $row['no_of_rooms']?></td>
							   <td><?php echo $row['short_descript']?></td>
                               <td><?php echo $row['descript']?></td>
                               <td><?php echo $row['owner_name']?></td>
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