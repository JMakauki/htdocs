<title>Register</title>
<?php include 'church_header.php'; ?>


<h2>Register</h2>






<?php 
	if (isset($_POST['submit'])) {

		$fname=mysqli_real_escape_string($connect,$_POST['fname']);
		$lname=mysqli_real_escape_string($connect,$_POST['lname']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$password=mysqli_real_escape_string($connect,sha1($_POST['lname']));
		$status='believer';
		



		$query=run("select * from user where email='$email'");

		if (!mysqli_num_rows($query)) {
			$church=mysqli_real_escape_string($connect,$_POST['church']);
			run("insert into user values('$fname','$lname','$email','$phone','$password','$status','','$church')");
			echo "<b><center style='color:green;'>You have been registered successfully. Sign in to continue. Use email as username and Last name as password</center></b><br>";
			die();
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
	<label for="churchselect">Church:</label>
	<select name="church" id="churchselect" required>
		<option></option>
		
		<?php 
			$query=run("select * from church order by location");
			while ($result=mysqli_fetch_array($query)) {
				$id=htmlspecialchars($result['id']);
				$name=htmlspecialchars($result['name']);
				$location=htmlspecialchars($result['location']);
				
				echo "<option value='$id'>$location - $name</option>";
			}
		 ?>
	</select><br>
	
	

	<input type="submit" name="submit" value="Register" class="submit">

</form>




<script src="church.js"></script>