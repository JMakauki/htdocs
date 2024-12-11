<?php include 'header.php'; ?>

<title>SAMS | Add room</title>
<link rel="icon" href="home.jpg">

<?php 


if (isset($_GET['h']) && ($_SESSION['status']=='Admin' || ($_SESSION['status']=="Staff" && $_SESSION['hostel']==$_GET['h']))) {
	
	$hostelid=$_GET['h'];
	$hostel=mysqli_fetch_array(run("select * from hostel where hostel_id='$hostelid'"));


	if (isset($_GET['submit'])) {
		$number=$_GET['number'];
		$capacity=$_GET['capacity'];

		if (mysqli_num_rows(run("select * from room where room_no='$number' and hostel_id='$hostelid'"))) {
			echo "<center style='color: red;'><i>Room ($number) already exists</i></center>";
		}else{
			if (run("insert into room(room_no,room_capacity,hostel_id) values ('$number','$capacity','$hostelid')")) {
				
				?>
					<script type="text/javascript">
						alert("One room is added successfully");
					</script>
				<?php
			}
		}

	}

	?>
	<h3><center>Add room</center></h3><hr>
		<form action>

			<br>
			<span>Hostel: <b><?php echo $hostel['Hostel_name'] ?></b></span><br><br>
			<input type="hidden" name="h" value="<?php echo $hostelid ?>">
			<input type="number" name="number" placeholder="Room number" required><br><br>
			<input type="number" name="capacity" placeholder="Capacity" required><br><br>
			<input type="submit" name="submit" value="Add" class="btn">
		</form>


	<?php

	

}else header("location:../accommodation");




 ?>

