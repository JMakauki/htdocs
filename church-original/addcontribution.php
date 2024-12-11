<title>Add contribution</title>

<?php include 'church_header.php'; ?>

<?php 
if ($_SESSION['status']!='ambassador') {
	die();
}

$church=$_SESSION['church'];
$result1=mysqli_fetch_array(run("select * from church where id='$church'"));

if (isset($_GET['submit'])) {
	$description=$_GET['description'];
	$deadline=$_GET['deadline'];

	run("insert into contribution(church,description,deadline) values('$church','$description','$deadline')");

	header('location:contributions.php');
}


 ?>

<h3>Add contribution for <?php echo $result1['name'] ?> </h3>

<form>

	<input type="text" name="description" placeholder="Description" required><br><br>
	Deadline:<br>
	<input type="date" name="deadline" required>
	<input type="submit" name="submit" value="Add">
</form>