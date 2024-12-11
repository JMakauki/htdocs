
<?php include 'header.php'; 

if ($_SESSION['status']=="Student") {
	die("<b style='color:red;'>Access denied</b>");
}

if (isset($_POST['submit'])) {
	$r=$_POST['r'];
	$id=$_POST['id'];
	run("update allocation set room='$r' where id='$id'");
	die("<form><i>Allocation is updated successfully</i><br><a href='../accommodation'>Dashboard</a></form>");
}






echo "<center><br><h3>Transfer to</h3></center>";

if (isset($_GET['id']) && isset($_GET['s'])) {
	$id=$_GET['id'];
	$sex=$_GET['s'];
	
	?>

	<?php if (!isset($_GET['h'])): ?>
		<form>
			<?php $query=run("select hostel_id,hostel_name,sex from hostel where sex='$sex'"); ?>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="s" value="<?php echo $sex ?>">
			Hostel:
			<select name="h" required>
				<option></option>

				<?php while ($result=mysqli_fetch_array($query)) {
					echo "<option value=".$result['hostel_id'].">".$result['hostel_name']."</option>";
				} ?>
			</select>

			<br><br>

			<input type="submit" value="Next" class="btn">
		</form>
		
	<?php endif ?>


	<?php if (isset($_GET['h'])): ?>
		<form method="post">

			<?php
			$hostel_id=$_GET['h'];
			 $query=run("select room_id,room_no,room_capacity,hostel_name from room join hostel on room.hostel_id=hostel.hostel_id where room.hostel_id='$hostel_id' and sex='$sex'");
			 $query1=run("select room_id,room_no,room_capacity,hostel_name from room join hostel on room.hostel_id=hostel.hostel_id where room.hostel_id='$hostel_id' and sex='$sex'");
			 $result1=mysqli_fetch_array($query1)
			  ?>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="s" value="<?php echo $sex ?>">
			Hostel: <b><?php echo $result1['hostel_name'] ?><br></b>
			Room:
			<select name="r" required>
				<option></option>

				<?php while ($result=mysqli_fetch_array($query)) {
					$room=$result['room_id'];
					$booked=mysqli_num_rows(run("select * from allocation where room='$room' and date>'$semester1'"));
					if ($booked<$result['room_capacity']) {
						echo "<option value=".$result['room_id'].">".$result['room_no']."</option>";
					}
					
				} ?>
			</select>

			<br><br>

			<input type="submit" name="submit" value="Submit" class="btn" onclick="return(confirm('Update this allocation?')) " >
		</form>
		
	<?php endif ?>

			
	<?php
}else header("location:../accommodation");


?>

