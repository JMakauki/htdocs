<?php 
	session_start();

	if (isset($_SESSION['jina'])) {
		# code...

	

	echo "welcome ";
	echo $_SESSION['jina']."<br>";

	$connection=mysqli_connect("localhost","root","","test");
	$sql="select * from admin";
	$query=mysqli_query($connection,$sql);

	
	while ( $result=mysqli_fetch_array($query)) {
		# code...
		echo $result['name'];
		echo "<br>";

	}


	
}else {
	header('location:test2.php');
}
	


 ?>