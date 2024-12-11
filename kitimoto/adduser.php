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

		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$password=mysqli_real_escape_string($connect,sha1($_POST['password']));
		$status='admin';
	

		$query=run("select * from user where name='$name'");

		if (!mysqli_num_rows($query)) {
		
					run("insert into user values('','$name','$password','$status')");
					echo "<b><center style='color:green;'>An Admin is successfully added</center></b><br>";	
					?>
						<script type="text/javascript">
							alert('Success: One user is added');
							location.assign("viewusers.php");
						</script>
					<?php
		}else{
			echo "<b><center style='color:red;'>ERROR: There is another user with the same name. Please try another name</center></b><br>";

		} 
			

		
	}

 ?>




<form method="post">
	<input type="text" name="name" placeholder="Name" required><br>
	<input type="tel" name="password" placeholder="Password" required><br><br>

	<input type="submit" name="submit" value="Add" class="submit">

</form>






<a href="viewusers.php">View users</a>


<script src="church.js"></script>