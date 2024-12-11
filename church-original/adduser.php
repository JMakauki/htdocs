<title>CSS - Add user</title>
<?php include 'church_header.php'; ?>

<?php 

if (isset($_SESSION['id'])) {} else die("<center style='color:red'>Access denied</center>");

 ?>


<?php if($_SESSION['status']=='admin'){ ?>
	<h2>Add user</h2>
<?php } else { ?>
	<h2>Add Ambassador for your church</h2>
<?php } ?>






<?php 
	if (isset($_POST['submit'])) {

		$fname=mysqli_real_escape_string($connect,$_POST['fname']);
		$lname=mysqli_real_escape_string($connect,$_POST['lname']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$password=mysqli_real_escape_string($connect,sha1($_POST['lname']));
		if(isset($_POST['status']))$status=mysqli_real_escape_string($connect,$_POST['status']);
		else $status='ambassador';
		



		$query=run("select * from user where email='$email'");

		if (!mysqli_num_rows($query)) {
			if ($_SESSION['status']=='admin') {
				if($status=='ambassador'){
					$church=mysqli_real_escape_string($connect,$_POST['church']);
					run("insert into user values('$fname','$lname','$email','$phone','$password','$status','','$church')");
					echo "<b><center style='color:green;'>An Ambassador is successfully added</center></b><br>";
				}
				else{
					run("insert into user(fname,lname,email,phone,password,status,id) values('$fname','$lname','$email','$phone','$password','$status','')");
					echo "<b><center style='color:green;'>An Admin is successfully added</center></b><br>";	

				}

			}else{
				$church=mysqli_real_escape_string($connect,$_SESSION['church']);
				run("insert into user values('$fname','$lname','$email','$phone','$password','$status','','$church')");
				echo "<b><center style='color:green;'>An Ambassador is successfully added</center></b><br>";
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
		<label for="status">Status:</label>
		<select name="status" id="status" onchange="hideChurch()" required>
			<option></option>
			<option  value="admin">Admin</option>
			<option value="ambassador">Ambassador</option>
			
		</select>
		
		<br>

		<span id="church">
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
				
			</select>
		</span>
	<?php } ?>

	<input type="submit" name="submit" value="Add" class="submit">

</form>






<a href="viewusers.php">View users</a>


<script src="church.js"></script>