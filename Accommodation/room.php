<title>SAMS | Rooms</title>

<?php include 'header.php';?>

<?php 

if (isset($_GET['h'])) {


		
	$hostel_id=$_GET['h'];
	$sex=$_SESSION['sex'];
	$query=run("select Hostel_name,case when sex='m' then 'For male' else 'for female' end sex from hostel where hostel_id='$hostel_id'");
	$result=mysqli_fetch_array($query);
	$hostel=$result['Hostel_name'];
	$hostelsex=$result['sex'];
	
	$query=run("select room_id,Room_no,room_capacity from room join hostel on room.hostel_id=hostel.hostel_id where room.hostel_id='$hostel_id' and sex='$sex'");

	if ($_SESSION['status']=='Staff' || $_SESSION['status']=='Admin') {
		$query=run("select room_id,Room_no,room_capacity from room join hostel on room.hostel_id=hostel.hostel_id where room.hostel_id='$hostel_id'");	
	}
	
	?>

	<h2><i><?php echo $hostel; ?></i></h2>
	<i>(<?php echo $hostelsex ?>)</i><hr>

	<?php if ($_SESSION['status']=='Admin' || ($_SESSION['status']=='Staff' && $_SESSION['hostel']==$hostel_id)): ?>
		<a href="addroom.php?h=<?php echo $hostel_id ?>" class=btn>Add room</a>	
	<?php endif ?>
	

	<table class="table">
		<tr>
			<th>Room No.</th>
			<th>Capacity</th>
			<th>Booked</th>
			<th>Action</th>
		</tr>

		<?php while ($result=mysqli_fetch_array($query)) {

			$room=$result['room_id'];
			$booked=mysqli_fetch_array( run("select count(*) booked from allocation where room='$room' and date>'$semester1'"));

		?>
			<tr>
				<td><?php echo $hostel ?> <?php echo $result['Room_no'] ?></td>
				<td><?php echo $result['room_capacity'] ?></td>
				<td><?php echo $booked['booked'] ?></td>
				<?php if ($_SESSION['status']=='Student' && $booked['booked']<$result['room_capacity']): ?>
					<td><a href="allocate.php?r=<?php echo $result['room_id']; ?>" onclick="return(confirm('Are you sure you want to book this room?'))">Book</a></td>	
				<?php endif ?>
				<?php if ($_SESSION['status']=='Staff' || $_SESSION['status']=='Admin'): ?>
					<td>
						<a href="view.php?r=<?php echo $result['room_id']; ?>">View</a>
						<?php if ($_SESSION['status']=='Admin' || ($_SESSION['status']=='Staff' && $_SESSION['hostel']==$hostel_id)): ?>
							<a href="deleteroom.php?id=<?php echo $room ?>&h=<?php echo $hostel_id ?>" title='Delete this room' onclick="return(confirm('Delete this room?')) " ><i class="fa fa-trash"></i></a>
						<?php endif ?>

					</td>
				<?php endif ?>

				

				
			</tr>


		<?php } ?>
			
	</table>







<?php 

}


 ?>