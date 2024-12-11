<?php include 'header.php'; 

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$h=$_GET['h'];
	run("delete from room where room_id='$id'");
	header("location:room.php?h=$h");
}


?>

