<title>Sign In</title>

<?php include 'appointment_header.php'; ?>



<center><h2>Sign in</h2></center>


<?php 

if (isset($_POST['submit'])) {

	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$password=mysqli_real_escape_string($connect,sha1($_POST['password']));
	$query=run("select * from user where name='$name' and password='$password' limit 1");

	if (mysqli_num_rows($query)==1) {
		$result=mysqli_fetch_array($query);
		$_SESSION['name']=$result['name'];
		$_SESSION['status']=$result['status'];
		$_SESSION['id']=$result['id'];

		header('location:../kitimoto');

	}else{
		echo "<center style='color:red'>Invalid username or password</center>";
	}

	
}

 ?>


<form method="post">
	<input type="name" name="name" placeholder="Your name" required><br>
	<input type="password" name="password" placeholder="Password" required><br>
	<input type="submit" name="submit" value="Sign in" class="submit">
</form>