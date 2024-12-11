<title>SAMS | Sign in</title>


<link rel="stylesheet" type="text/css" href="accommodation.css">
<link rel="icon" href="home.jpg">

<header><br>
	<center><h1>Student Accommodation Management System</h1></center>

<br><br>
</header>


<?php 
include 'dbconnect.php';
session_start();
 ?>

<center><h2>Sign in</h2></center>

<?php 
	if (isset($_POST['submit'])) {
		session_unset();
		$username=mysqli_real_escape_string($connect,$_POST['username']);
		$password=$_POST['password'];
		$query=run("select * from staff where staff_id='$username' and password='$password' limit 1");
		if (mysqli_num_rows($query)) {
			
			$result=mysqli_fetch_array($query);
			
			$_SESSION['status']='Staff';
			$_SESSION['id']=$result['Staff_ID'];
			$_SESSION['sex']=$result['Sex'];
			$_SESSION['name']=$result['FirstName'].' '.$result['LastName'];
			$_SESSION['hostel']=$result['hostel_ID'];
			header('location:../accommodation');
		
		}else {
			$query=run("select * from student where regno='$username' and password='$password' limit 1");
			if (mysqli_num_rows($query)) {
				
				$result=mysqli_fetch_array($query);
				
				$_SESSION['status']='Student';
				$_SESSION['id']=$result['regno'];
				$_SESSION['sex']=$result['sex'];
				$_SESSION['name']=$result['FirstName'].' '.$result['LastName'];
				header('location:../accommodation');
				
			}else{
				$query=run("select * from admin where username='$username' and password='$password' limit 1");
				if (mysqli_num_rows($query)) {
					
					$result=mysqli_fetch_array($query);
					
					$_SESSION['status']='Admin';
					$_SESSION['id']=$result['username'];
					$_SESSION['sex']=$result['sex'];
					$_SESSION['name']=$result['FirstName'].' '.$result['LastName'];
					header('location:../accommodation');
				}else{
					echo "<center><i style='color:red'>Invalid Username or Password</i></center>";
				}
			}
		}
		
	}
 ?>

 <form method="POST" >
 	<input type="text" name="username" placeholder="Username" required><br><br>
 	<input type="password" name="password" placeholder="Password" required><br><br>
 	<input type="submit" name="submit" value="Sign In" class="btn">
 </form>

