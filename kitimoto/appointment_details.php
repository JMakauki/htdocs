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
	run("delete from orders where id='$id'");
	header('location:../kitimoto');
}


if (isset($_GET['id'])) {
	$id=$_GET['id'];
	if ($_SESSION['status']=='user') {
		$id=$_SESSION['id'];
		$query=run("select * from appointment where user='$id' order by createdon desc");

	}else{
		$query=run("select * from orders where id='$id'");
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
					<th>Location: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['location'])?></td>
				</tr>
				<tr>
					<th>Amount: &emsp;</th>
					<td><?php echo  htmlspecialchars($result['amount']) ?></td>
				</tr>
				
				<tr>
					<th>Remarks: &emsp;</th>
					<td>
						<?php if ($result['remarks']): ?>
							<?php echo  htmlspecialchars($result['remarks']) ?>
								
						<?php else: ?>
							<?php echo 'Not delivered' ?>
						<?php endif ?>
					</td>
				</tr>
				<tr>
					<th>Payment: &emsp;</th>
					<td>
						<?php if ($result['paid']): ?>
							<?php echo  htmlspecialchars($result['paid']) ?>
								
						<?php else: ?>
							<?php echo 'Not paid' ?>
						<?php endif ?>
					</td>
				</tr>
				
			</table>

			<?php if ($result['remarks']): ?>
				<?php if ($result['remarks']=='Confirmed'): ?>
					<center><br>
						
					</center>
				<?php endif ?>
								
			<?php else: ?>							
				<center>
					<br>
					<a class="submit" href="remarks.php?r=Delivered&id=<?php echo $result['id'] ?>">Delivered</a>
				</center>
			<?php endif ?>

			<?php if ($result['paid']): ?>
				<?php if ($result['paid']=='Confirmed'): ?>
					<center><br>
						
					</center>
				<?php endif ?>
								
			<?php else: ?>							
				<center>
					<br>
					<a class="submit" href="remarks.php?p=Paid&id=<?php echo $result['id'] ?>">Paid</a>
				</center>
			<?php endif ?>

			


		<?php
	

	 ?>
	<br><br>
	 <center>
	 	<a class="submit" href="editappointment.php?name=<?php echo htmlspecialchars($result['name']) ?>&remarks=<?php echo htmlspecialchars($result['remarks']) ?>&phone=<?php echo htmlspecialchars($result['phone']) ?>&id=<?php echo htmlspecialchars($result['id']) ?>&location=<?php echo htmlspecialchars($result['location']) ?>&amount=<?php echo htmlspecialchars($result['amount']) ?>&paid=<?php echo htmlspecialchars($result['paid']) ?>">Edit </a><br><br>
	 	<form method="post">
	 		<button type="submit" name="delete" value="Delete" class="submit" onclick="return confirm('Delete this order?')">Delete</button><br><br><hr>
	 	</form>
	 </center>

	<?php } ?>

	

	<?php if ($_SESSION['status']=='user') {
		?><center><a class="submit" href="addappointment.php">Add appointment</a></center><?php	
	} ?>



<?php } ?>
<div style="text-align:right; padding-right: 200px;">
	<a href="../kitimoto" >Back to Home</a>
</div>

<br><br><br>
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
