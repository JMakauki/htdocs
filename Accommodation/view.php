<title>SAMS | View room</title>
<?php 

include 'header.php';

if ($_SESSION['status']=='Student') {
	header('location:../accommodation');
}

if (isset($_GET['r'])) {
	$room=$_GET['r'];
	$query=run("select distinct regno,firstname, lastname, program, phone,email,id,sex from student join allocation on regno=student where room='$room' and date>'$semester1'");
	$hostel=mysqli_fetch_array(run("select hostel.hostel_id,hostel_name,room_no,room_capacity from hostel join room on room.hostel_id=hostel.hostel_id where room_id='$room'"));
	
}

?>


<center>
	<div id="">
		hostel:<a href="room.php?h=<?php echo $hostel['hostel_id'] ?>"> <b><i><?php echo $hostel['hostel_name'] ?></i></b></a>
		<br> 
		room: <b><?php echo $hostel['room_no']; ?></b>
		Capacity: <b><?php echo $hostel['room_capacity']; ?></b><br>

	</div>
</center><br>
<table class="table">
	<tr>
		<th>Reg. No.</th>
		<th>Name</th>
		<th>Programme</th>
		<th>Phone No.</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	<?php while ($result=mysqli_fetch_array($query)) {?>
	<tr>
		<td><?php echo $result['regno'] ?></td>
		<td><?php echo $result['firstname'] ?> <?php echo $result['lastname'] ?></td>
		<td><?php echo $result['program'] ?></td>
		<td><?php echo $result['phone'] ?></td>
		<td><?php echo $result['email'] ?></td>
		<td><a href="changeroom.php?id=<?php echo $result['id'] ?>&s=<?php echo $result['sex'] ?>" title='Change room' ><i class="fa fa-edit"></i></a>
		<a href="cancel.php?id=<?php echo $result['id']  ?>&r=<?php echo $room ?>" title='Cancel allocation' onclick="return(confirm('Cancel this allocation?')) " ><i class="fa fa-times-square"></i></a></td>
	</tr>
	<?php } ?>
</table>
<br><br><br>

