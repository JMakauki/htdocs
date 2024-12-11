

<?php include 'church_header.php'; ?>

<?php if (!isset($_SESSION['status'])) {
	die("<center style='color:red'>Access denied</center>");
} ?>

<?php if($_SESSION['status']=='admin'){ ?>
	<h2>Users</h2>
<?php } ?>
	




	<?php if (isset($_SESSION['status']) && $_SESSION['status']=='ambassador') { ?>
		<a href="adduser.php">Add Ambassador</a>
		<title>CSS - Ambassadors</title>
	<?php } ?>

	<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin') { ?>
		<a href="adduser.php">Add user</a>
		<title>CSS - Users</title>
	<?php } ?>


<?php 

	if (isset($_POST['delete'])) {
		$id=$_POST['id'];
		$query=run("delete from user where id='$id'");
	}

 ?>

 <?php if ($_SESSION['status']=='admin'): ?>
 	
	<h3>Administrators</h3>
	<table border="1" rules="all" >
		<tr >
			<th>S/N</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone no.</th>

		</tr>
		<?php 
			$query=run("select * from user where status='admin' order by fname");
			$sn=1;
			if (mysqli_num_rows($query)==0) {
				echo "<tr><td colspan='100%'><center>No registered administrator</center></td></tr>";
			}
			while ($result=mysqli_fetch_array($query)) {
				?>

					<tr>
						<td><?php echo $sn; $sn++ ?></td>
						<td><?php echo $result['fname']." ".$result['lname'] ?></td>
						<td><?php echo $result['email'] ?></td>
						<td><?php echo $result['phone'] ?></td>
						
					</tr>

				<?php
			}

		 ?>

	</table>
<?php endif ?>


<?php if ($_SESSION['status']=='admin'): ?>
	<h3>Ambassadors</h3>	
<?php endif ?>

<?php if ($_SESSION['status']=='ambassador'): ?>
	<h3>Ambassadors of your church</h3>	
<?php endif ?>

<table border="1" rules="all" >
	<tr id="tableheading">
		<th>S/N</th>
		<th>Name</th>
		<th>church</th>
		<th>Email</th>
		<th>Phone number</th>

		<?php if ($_SESSION['status']=="admin"): ?>
			<th>Action</th>			
		<?php endif ?>

		

	</tr>
	<?php 
		$church=$_SESSION['church'];
		$query=$_SESSION['status']=='admin'?run("select * from user where status='ambassador' order by fname"):run("select * from user where church='$church'");
		$sn=1;
		if (mysqli_num_rows($query)==0) {
			echo "<tr><td colspan='100%'><center>No registered ambassador</center></td></tr>";
		}
		while ($result=mysqli_fetch_array($query)) {
			?>

				<tr>
					<td><?php echo $sn; $sn++ ?></td>
					<td><?php echo $result['fname']." ".$result['lname'] ?></td>
					<td>
						<?php 
							$churchid=$result['church'];
							$churchquery=run("select * from church where id='$churchid'");
							$churchresult=mysqli_fetch_array($churchquery);
							echo $churchresult['name']." (".$churchresult['location'].")";
						?>
					</td>
					<td><?php echo $result['email'] ?></td>
					<td><?php echo $result['phone'] ?></td>

					<?php if ($_SESSION['status']=="admin"): ?>
						<td>
							<form method="post">
								<button name="delete" onclick="return confirm('Are you sure you want to Delete this User')">Delete</button>
								<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
							</form>
						</td>
					<?php endif ?>


	
				</tr>

			<?php
		}

	 ?>

</table>

<script type="text/javascript" src="table.js"></script>