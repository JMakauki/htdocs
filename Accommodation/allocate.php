<?php 

include 'header.php';

if (isset($_GET['r'])) {
	$room=$_GET['r'];
	$student=$_SESSION['id'];





	if ($_SESSION['allocated']=='yes') {
		
	}else {
		$capacity=mysqli_fetch_array( run("select room_capacity from room where room_id='$room'"));
		$booked=mysqli_fetch_array( run("select count(*) booked from allocation where room='$room' and date>'$semester1'"));

		if ($booked['booked']<$capacity['room_capacity']) {
			if (date('20y-m-d')>=$semester1) run("insert into allocation(student,room) values('$student','$room')");
		}

		
	}
}
header("location:../accommodation");

 ?>