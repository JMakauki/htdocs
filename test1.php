<?php 

$username="abc";
$password="123";


if (isset($_GET['submit'])) {
	if($_GET['username']==$username && $_GET['password']==$password){
		echo "correct password";

		$_SESSION['name']=$username;
		$_SESSION['mname']=$username;
		$_SESSION['name']=$username;
		$_SESSION['name']=$username;
		$_SESSION['name']=$username;




	}else{
		echo "invalid username or password";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="test1.php" method="GET">
		
		<input type="text" name="username" placeholder="username" required value="<?php if (isset($username)) echo $username; ?>"><br>
		
		<input type="password" name="password" placeholder="password" required><br>
		
		<center><input  type="submit" name="submit" value="register"></center>
	</form>
</body>
</html>