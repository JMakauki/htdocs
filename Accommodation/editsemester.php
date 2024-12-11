<title>SAMS | Change semester info</title>
<link rel="icon" href="home.jpg">

<?php 

include 'header.php';


if ($_SESSION['status']!='Student') {

	if (isset($_POST['submit'])) {
		$s1=fopen('semester1.txt', 'w');
		

		fwrite($s1, $_POST['semester1']);
		
		fclose($s1);
		
		header('location:semester.php');
	}
	
	?>
	<br>
	<form class="table" method="post">
		<label >Start of current semester</label><input type="date" name="semester1" required><br><br>
		<input type="submit" name="submit" value="Submit" class="btn">
	</form>





	<?php





}else header("location:../accommodation");

 ?>

