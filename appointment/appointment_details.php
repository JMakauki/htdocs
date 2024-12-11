<?php include 'appointment_header.php'; ?>

<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>

<?php 


if (isset($_POST['delete'])) {
	$id=$_GET['id'];
	run("delete from appointment where id='$id'");
	header('location:../appointment');
}


if (isset($_GET['id'])) {
	$id=$_GET['id'];
	if ($_SESSION['status']=='user') {
		$id=$_SESSION['id'];
		$query=run("select * from appointment where user='$id' order by createdon desc");

	}else{
		$query=run("select * from appointment where id='$id'");
	}
	
	while($result=mysqli_fetch_array($query)){
		?>
			<table>
				<tr id="tableheading"></tr>
				<tr>
					<th>Name: &emsp;</th>
					<td class="name"><?php echo  htmlspecialchars($result['name']) ?></td>
				</tr>
				<tr>
					<th>Phone number: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['phone']) ?></td>
				</tr>
				<tr>
					<th>Date: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['date']) ?></td>
				</tr>
				<tr>
					<th>Time: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['time'])?></td>
				</tr>
				<tr>
					<th>From: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['fromwhere'])?></td>
				</tr>
				<tr>
					<th>Main need: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['mainneed']) ?></td>
				</tr>
				<tr>
					<th>Created on: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['createdon']) ?></td>
				</tr>
				<tr>
					<th>Remarks: &emsp;</th>
					<td>
						<?php if ($result['remarks']): ?>
							<?php echo  htmlspecialchars($result['remarks']) ?>
								
						<?php else: ?>
							<?php echo '-To be confirmed. ' ?>
						<?php endif ?>
					</td>
				</tr>
				
			</table>

			<?php if ($result['remarks']): ?>
				<?php if ($result['remarks']=='Confirmed'): ?>
					<center><br>
						<a class="submit" href="remarks.php?r=Done&id=<?php echo $result['id'] ?>">Done</a>
						<a class="submit" href="remarks.php?r=Postpone&id=<?php echo $result['id'] ?>">Postpone</a>
					</center>
				<?php endif ?>
								
			<?php else: ?>							
				<center>
					<br>
					<a class="submit" href="remarks.php?r=Confirmed&id=<?php echo $result['id'] ?>">Confirm now</a> |
					<a class="submit" href="remarks.php?r=Postpone&id=<?php echo $result['id'] ?>">Postpone</a>
				</center>
			<?php endif ?>

			


		<?php
	

	 ?>
	<br><br>
	 <center>
	 	<a class="submit" href="editappointment.php?name=<?php echo htmlspecialchars($result['name']) ?>&date=<?php echo htmlspecialchars($result['date']) ?>&time=<?php echo htmlspecialchars($result['time']) ?>&remarks=<?php echo htmlspecialchars($result['remarks']) ?>&phone=<?php echo htmlspecialchars($result['phone']) ?>&id=<?php echo htmlspecialchars($result['id']) ?>&fromwhere=<?php echo htmlspecialchars($result['fromwhere']) ?>&mainneed=<?php echo htmlspecialchars($result['mainneed']) ?>">Edit </a><br><br>
	 	<form method="post">
	 		<button type="submit" name="delete" value="Delete" class="submit" onclick="return confirm('Delete this appointment?')">Delete</button><br><br><hr>
	 	</form>
	 </center>

	<?php } ?>

	<br><br><br>

	<?php if ($_SESSION['status']=='user') {
		?><center><a class="submit" href="addappointment.php">Add appointment</a></center><?php	
	} ?>

<?php } ?>

<style type="text/css">
	th{
		text-align: right;
		padding: 10px;
		background-color: #bbb;
		width: 30%;
	}
	tr:hover{
		background-color: #b6f !important;

	}
</style>



 <!-- <link rel="stylesheet" type="text/css" href="appointment.css"> -->
 <script type="text/javascript" src="table.js"></script>
