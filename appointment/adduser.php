<title>Add user</title>
<?php include 'appointment_header.php'; ?>

<?php 

if (isset($_SESSION['id'])) {} else die("<center style='color:red'>Access denied</center>");

 ?>


<?php if($_SESSION['status']=='admin'){ ?>
	<h2>Add user</h2>
<?php } ?>






<?php 
	if (isset($_POST['submit'])) {

		$fname=mysqli_real_escape_string($connect,$_POST['fname']);
		$lname=mysqli_real_escape_string($connect,$_POST['lname']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$password=mysqli_real_escape_string($connect,sha1($_POST['lname']));
		if(isset($_POST['status']))$status=mysqli_real_escape_string($connect,$_POST['status']);
		else $status='user';
	

		$query=run("select * from user where email='$email'");

		if (!mysqli_num_rows($query)) {
			if ($_SESSION['status']=='admin') {
				if($status=='user'){
					
					run("insert into user values('$fname','$lname','$email','$phone','$password','$status','')");
					echo "<b><center style='color:green;'>A normal user is successfully added</center></b><br>";
				}
				else{
					run("insert into user(fname,lname,email,phone,password,status,id) values('$fname','$lname','$email','$phone','$password','$status','')");
					echo "<b><center style='color:green;'>An Admin is successfully added</center></b><br>";	

				}

			}else{
				
				run("insert into user values('$fname','$lname','$email','$phone','$password','$status','')");
				echo "<b><center style='color:green;'>A normal user is successfully added</center></b><br>";
			}
		}else{
			echo "<b><center style='color:red;'>ERROR: There is another user with the same email. Please try another email</center></b><br>";

		} 
			

		
	}

 ?>




<form method="post">
	<input type="text" name="fname" placeholder="First name" required><br>
	<input type="text" name="lname" placeholder="Last name" required><br>
	<input type="email" name="email" placeholder="Email" required><br>
	<input type="tel" name="phone" placeholder="Phone number" required><br>
	
	<?php if ($_SESSION['status']=='admin') { ?>
		<br><label for="status">Status:</label><br>
		<select name="status" id="status" onchange="hideChurch()" required class="input">
			<option></option>
			<option  value="admin">Admin</option>
			<option value="user">Normal user</option>
		</select><br>
		
		<br>

		
	<?php } ?>

	<input type="submit" name="submit" value="Add" class="submit">

</form>






<a href="viewusers.php">View users</a>


<script src="church.js"></script>