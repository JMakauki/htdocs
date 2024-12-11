<?php include 'header.php'; ?>

<title>Add hostel | SAMS</title>

<h2>Add hostel</h2><hr>

<?php 

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$sex=$_POST['sex'];

	if (mysqli_num_rows(run("select * from hostel where hostel_name='$name'"))) {
		echo "<i style='color:red;'>Hostel \"$name\" already exists</i>";
	}else{
		run("insert into hostel(hostel_name,sex) values('$name','$sex')");
		echo $name." hostel is added successfully";
	}
}



 ?>

<form method="post">
	<label>Hostel name</label>
	<input type="text" name="name" placeholder="Name" required><br><br>

	<label>Sex</label>
	<select name="sex" required>
		<option></option>
		<option value="M">Male</option>
		<option value="F">Female</option>
	</select>
	<br><br>

	<input type="submit" name="submit" value="Add" class="btn">
</form>