

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
		<tr id="tableheading">
			<th style="width: 100px;">S/N</th>
			<th>Name</th>
		</tr>
		<?php 
			$query=run("select * from user where status='admin' order by name");
			$sn=1;
			if (mysqli_num_rows($query)==0) {
				echo "<tr><td colspan='100%'><center>No registered administrator</center></td></tr>";
			}
			while ($result=mysqli_fetch_array($query)) {
				?>

					<tr>
						<td style="text-align: right;"><?php echo $sn; $sn++ ?></td>
						<td style="text-transform: capitalize;"><?php echo $result['name'] ?></td>
					</tr>

				<?php
			}

		 ?>

	</table>
<?php endif ?>




<br><br>


<script type="text/javascript" src="table.js"></script>