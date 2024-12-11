<?php 
	session_start();


	if (isset($_POST["submit"])) {
		# code...
		$name=$_POST['name'];
		$password=$_POST['password'];

		$connection=mysqli_connect("localhost","root","","test");


		//for admin
		$sql="select * from admin where name='$name' and password='$password' limit 1";
		$query=mysqli_query($connection,$sql);


		if (mysqli_num_rows($query)!=0) {
			# code...
			$_SESSION['name']=$name;
			header('location:admin.php');
		}


		//for normal
		$sql="select * from normal where name='$name' and password='$password' limit 1";
		$query=mysqli_query($connection,$sql);

		if (!mysqli_num_rows($query)==0) {
			# code...
			$_SESSION['name']=$name;
			header('location:normal.php');
		}else echo "invalid username  or password";






	}


 ?>



 <form method="POST">
 	
 	<input type="text" name="name" placeholder="name">

 	<input type="password" name="password" placeholder="password">

 	<input type="submit" name="submit">


 </form>


 