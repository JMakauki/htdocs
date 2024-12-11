<title>CSS - Sign In</title>

<?php include 'church_header.php'; ?>




<h2>Sign in</h2>

<?php 

if (isset($_POST['submit'])) {

	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$password=mysqli_real_escape_string($connect,sha1($_POST['password']));
	$query=run("select * from user where email='$email' and password='$password' limit 1");

	if (mysqli_num_rows($query)==1) {
		$result=mysqli_fetch_array($query);
		$_SESSION['fname']=$result['fname'];
		$_SESSION['lname']=$result['lname'];
		$_SESSION['email']=$result['email'];
		$_SESSION['phone']=$result['phone'];
		$_SESSION['status']=$result['status'];
		$_SESSION['id']=$result['id'];
		$_SESSION['church']=$result['church'];

		header('location:../church');

	}else{
		echo "<center style='color:red'>Invalid username or password</center>";
	}

	
}

 ?>


<form method="post">
	<input type="email" name="email" placeholder="Your email" required><br>
	<input type="password" name="password" placeholder="Password" required><br>
	<input type="submit" name="submit" value="Sign in" class="submit">
</form>