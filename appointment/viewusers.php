

<?php include 'appointment_header.php'; ?>

<?php if (!isset($_SESSION['status'])) {
	die("<center style='color:red'>Access denied</center>");
} ?>

<center>
	<?php if($_SESSION['status']=='admin'){ ?>
		<h2>USERS</h2>
	<?php } ?>
		




		

		<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin') { ?>
			<a href="adduser.php" class="submit">Add user</a><br><br><br>
			
		<?php } ?>


	<?php 

		if (isset($_POST['delete'])) {
			$id=$_POST['id'];
			$query=run("delete from user where id='$id'");
		}

	 ?>

	 <?php if ($_SESSION['status']=='admin'): ?>
	 	
		
		
</center>

	<table rules="all" >
		<caption class="scheduledate"><b>Administrators</b></caption>
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
						<td style="text-transform: capitalize;"><?php echo $result['fname']." ".$result['lname'] ?></td>
						<td><?php echo $result['email'] ?></td>
						<td><?php echo $result['phone'] ?></td>
						
					</tr>

				<?php
			}

		 ?>

	</table>
<?php endif ?>




<br><br>

<table rules="all" >
	<caption class="scheduledate"><b>Normal users</b></caption>
	<tr id="tableheading">
		<th>S/N</th>
		<th>Name</th>
	
		<th>Email</th>
		<th>Phone number</th>

		<?php if ($_SESSION['status']=="admin"): ?>
			<th>Action</th>			
		<?php endif ?>

		

	</tr>
	<?php 
		$appointment=$_SESSION['appointment'];
		$query=$_SESSION['status']=='admin'?run("select * from user where status!='admin' order by fname"):"";
		$sn=1;
		if (mysqli_num_rows($query)==0) {
			echo "<tr><td colspan='100%'><center>No registered ambassador</center></td></tr>";
		}
		while ($result=mysqli_fetch_array($query)) {
			?>

				<tr>
					<td><?php echo $sn; $sn++ ?></td>
					<td style="text-transform: capitalize;"><?php echo $result['fname']." ".$result['lname'] ?></td>
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