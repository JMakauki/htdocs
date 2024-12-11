<title>CSS - Churches</title>

<?php include 'church_header.php'; ?>

<h2>Churches</h2>

<?php 

	if (isset($_POST['delete'])) {
		$id=$_POST['id'];
		$query=run("delete from church where id='$id'");
	}

 ?>


<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin'): ?>
	<a href="addchurch.php">Add church</a>	
<?php endif ?>
 

<table border="1" rules="all" width="700px">
	<tr id="tableheading">
		<th>S/N</th>
		<th>Name</th>
		<th>Location</th>
		<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin'): ?>
			<th>Action</th>	
		<?php endif ?>

		

	</tr>
	<?php 
		$query=run("select * from church order by location");
		$sn=1;
		if (mysqli_num_rows($query)==0) {
			echo "<tr><td colspan='100%'><center>No registered churches</center></td></tr>";
		}
		while ($result=mysqli_fetch_array($query)) {
			?>

				<tr class="eachchurchrow">
					<td>
						<a href="churchdetails.php?id=<?php echo $result['id'] ?>">
							<div>
								<?php echo $sn; $sn++ ?>
							</div>
						</a>	
					</td>
					<td>
						<a href="churchdetails.php?id=<?php echo $result['id'] ?>">
							<div>
								<?php echo $result['name'] ?>
							</div>
						</a>
					</td>
					<td>
						<a href="churchdetails.php?id=<?php echo $result['id'] ?>">
							<div>
								<?php echo $result['location'] ?>
							</div>
						</a>
					</td>
					
					<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin'): ?>
						<td>
							<form method="post">
								<button name="delete" onclick="return confirm('Are you sure you want to Delete this Church')">Delete</button>
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

<link rel="stylesheet" type="text/css" href="church.css">