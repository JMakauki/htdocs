<title>SAMS | Dashboard</title>

<?php include 'header.php'; ?>



<?php 
	


	$sex=$_SESSION['sex'];
	$id=$_SESSION['id'];

	$query = ($_SESSION['status']=='Student') ? run("select hostel_id,hostel_name,sex from hostel where sex='$sex'") : run("select hostel_id,hostel_name,sex from hostel order by sex");

	$allocation=run("select * from allocation join room on allocation.room=room.room_id join hostel on hostel.hostel_id=room.hostel_id where student='$id' and date>'$semester1' limit 1");
	
?>




<?php if (mysqli_num_rows($allocation)):
	$_SESSION['allocated']='yes';
	
	$result=mysqli_fetch_array($allocation);
?>

	<br>
	<center class="table"><i style="color: #333;"><b>Congratulations! </b>You have been allocated on <br><br>hostel: <b><?php echo $result['Hostel_name'] ?></b><br>Room number: <b><?php echo $result['Room_no'] ?></b></i></center>


<?php else: 
	$_SESSION['allocated']='no';
	
	?>

	<h2>Hostels</h2>

	<?php 
		if ($_SESSION['status']=='Admin') {
			?><a href="addhostel.php">Add hostel <i class="fa fa-plus-circle"></i> </a><?php
		}
	 ?>

	<div class="">
	<?php while ($result=mysqli_fetch_array($query)) {?>
		
		
		
		<a class="" href="room.php?h=<?php echo $result['hostel_id'] ?>" >
			<?php if ($_SESSION['status']) {
				if ($result['sex']=='M') {
					?><i class="mycard fa fa-building" style="background-color: lightblue;"></i><?php
				}if ($result['sex']=='F') {
					?><i class="mycard fa fa-building" style="background-color: pink;"></i><?php
				}
			} ?><br>
			<?php echo $result['hostel_name'] ?>
			<?php if ($_SESSION['status']) {
				if ($result['sex']=='M') {
					?><i class=" fa fa-mars"></i><?php
				}if ($result['sex']=='F') {
					?><i class=" fa fa-venus"></i><?php
				}
			} ?>

		</a>

<?php if ($_SESSION['status']=='Admin'): ?>
	<?php $hname=$result['hostel_name'] ?>
		<a href="deletehostel.php?id=<?php echo $result['hostel_id'] ?>" class="delete" onclick="return(confirm('Delete <?php echo $hname ?> hostel?'))"><i class="fa fa-trash"></i></a>


		
		&nbsp&nbsp&nbsp
	
<?php endif ?>

		

	<?php } ?>
	</div>

<?php endif ?>

