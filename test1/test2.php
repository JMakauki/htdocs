<?php 

	session_start();
	
	if(isset($_GET['submit'])){

	$username=$_GET['name'];
	$password=$_GET['password'];

	$connection=mysqli_connect("localhost","root","","test");
	$sql="insert into admin values('$username','$password')";
	$query=mysqli_query($connection,$sql);
	$_SESSION['jina']=$username;

}


	

 ?>

 <form method="GET">
 	
 	<input type="text" name="name" placeholder="name">

 	<input type="password" name="password" placeholder="password">

 	<input type="submit" name="submit">


 </form>
