<?php include 'header.php'; 

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	run("delete from hostel where hostel_id='$id'");
	header('location:../accommodation');
}


?>

