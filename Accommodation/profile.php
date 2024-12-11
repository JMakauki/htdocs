<title>SAMS | Profile</title>

<?php include 'header.php'; ?>

<center><h2>Profile</h2></center>
<hr>
	
	<?php if ($_SESSION['status']=='Staff'){ 
		$id=$_SESSION['id'];
		$result=mysqli_fetch_array(run("select * from staff join hostel on staff.hostel_ID=hostel.hostel_ID where staff_id='$id'"));
		?>

		<table class="table">
			<tr>
				<th>Staff ID</th>
				<td><?php echo $result['Staff_ID']; ?></th>
			</tr>
			<tr>
				<th>Name</th>
				<td style="text-transform: capitalize;"><?php echo $result['FirstName'].' '.$result['LastName']; ?></th>
			</tr>
			<tr>
				<th>Date of birth</th>
				<td><?php echo $result['DOB']; ?></th>
			</tr>
			<tr>
				<th>Phone number</th>
				<td><?php echo $result['Phone']; ?></th>
			</tr>
			<tr>
				<th>Email address</th>
				<td><?php echo $result['Email']; ?></th>
			</tr>
			<tr>
				<th>Assigned hostel</th>
				<td><a href="room.php?h=<?php echo $result['hostel_ID'] ?>"><?php echo $result['Hostel_name'] ?></a></td>
			</tr>
			
		</table>

	<?php } else if($_SESSION['status']=='Student'){
		$id=$_SESSION['id'];
		$result=mysqli_fetch_array(run("select * from student where regno='$id'"));
		?>

		<table class="table">
			<tr>
				<th>Registration number</th>
				<td><?php echo $result['regno']; ?></th>
			</tr>
			<tr>
				<th>Name</th>
				<td style="text-transform: capitalize;"><?php echo $result['FirstName'].' '.$result['LastName']; ?></th>
			</tr>
			<tr>
				<th>Date of birth</th>
				<td><?php echo $result['DOB']; ?></th>
			</tr>
			<tr>
				<th>Phone number</th>
				<td><?php echo $result['Phone']; ?></th>
			</tr>
			<tr>
				<th>Email address</th>
				<td><?php echo $result['Email']; ?></th>
			</tr>
			<tr>
				<th>Programme</th>
				<td><?php echo $result['Program']; ?></th>
			</tr>
			
		</table>
	<?php } else if($_SESSION['status']=='Admin'){
		$id=$_SESSION['id'];
		$result=mysqli_fetch_array(run("select * from admin where username='$id'"));
		?>

		<table class="table">
			<tr>
				<th>Username</th>
				<td><?php echo $result['username']; ?></th>
			</tr>
			<tr>
				<th>Name</th>
				<td style="text-transform: capitalize;"><?php echo $result['FirstName'].' '.$result['LastName']; ?></th>
			</tr>
			
			
		</table>
		
	<?php } ?>
		<center>
			
			<br>
			<a class="btn" href="changepassword.php">Change password</a><br><br>
			<a class="btn" href="signout.php" onclick="return confirm('Are you sure you want to sign out?')">Sign out</a>

			<br><br><br><br>

		</center>
