<title>CSS - Add church</title>

<?php include 'church_header.php'; ?>

<?php 

if (isset($_SESSION['id'])) {} else die("<center style='color:red'>Access denied</center>");

 ?>

<h2>Add church</h2>


<?php 
	if (isset($_POST['submit'])) {
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$location=mysqli_real_escape_string($connect,$_POST['location']);

		$query=run("select * from church where name='$name' and location='$location'");

		if(!mysqli_num_rows($query)){
			run("insert into church values('','$name','$location')");
			echo "<b><center style='color:green;'>One church is added successfully</center></b><br>";
		}else{
			echo "<b><center style='color:red;'>The church you are trying to add already exists</center></b><br>";
		}

		

		
	}
	


 ?>

<form method="post" >
	<input type="text" name="name" placeholder="Name" required><br>
	<input type="text" name="location" placeholder="Location" required><br>
	<input type="submit" name="submit" value="Add">
</form>