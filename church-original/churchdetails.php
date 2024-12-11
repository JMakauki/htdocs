

<?php include 'church_header.php'; ?>

<?php 	
		if (!isset($_GET['id'])) {

			die("<i style='color:red'>Invalid URL</i>");
		}
 ?>

<h2><?php 
		$id=$_GET['id'];
		$query1=run("select * from church where id='$id'");
		$church=mysqli_fetch_array($query1);
		echo $church['name']."<br>";
		echo $church['location']."<br>";
		?><title>CSS - <?php echo $church['name']." (".$church['location'].")" ?></title><?php



 ?>	</h2>

 

<?php if (isset($_SESSION['status']) && $_SESSION['status']=='ambassador' && $_SESSION['church']==$_GET['id']): ?>
	<a href="addevent.php">Add event</a>
<?php endif ?>

<?php 

	if (isset($_POST['delete']) && isset($_SESSION['status'])) {
		$id=$_POST['id'];
		run("delete from schedule where id='$id'");
	}
 ?>




<br>

<table border="1" rules="all">
	<tr>
		<th>Time</th>
		<th class='date'>Date</th>
		<th>Event</th>
		
		<th>Repeat</th>
		<th class="day">day</th>
		<?php if (isset($_SESSION['status'])&&$_SESSION['status']=='ambassador'): ?>
			<th>Action</th>
		<?php endif ?>
	</tr>
	
	<?php 
		
		$id=$_GET['id'];
		$query=run("select * from schedule where church=$id order by date desc");
		if (mysqli_num_rows($query)==0) {
			?><tr><td colspan="100%"><center>There is nothing to show for this church</center></td></tr><?php
		}

		while ($result=mysqli_fetch_array($query)) {
			?>
				<tr>
					<td>
						<?php echo $result['time'] ?>
					</td>
					<td class="date">
						<?php echo $result['date'] ?>
					</td>
					<td>
						<?php echo $result['event'] ?>
					</td>
				
					<td>
						<?php echo $result['repeat'] ?>
					</td>
					
						
					
					<td class="day">
						<?php 

							if($result['repeat']!='daily'){
								switch (date('w',strtotime($result['date']))) {
									case '0':
										echo 'Sunday';
										break;

									case '1':
										echo "Monday";
										break;

									case '2':
										echo "Tuesday";
										break;

									case '3':
										echo "Wednesday";
										break;
									case '4':
										echo "Thursday";
										break;
									case '5':
										echo "Friday";
										break;

									case '6':
										echo "Saturday";
										break;
									
									
									default:
										// code...
										break;
								}
							}
						 ?>
					</td>
						<?php if (isset($_SESSION['status'])&&$_SESSION['status']=='ambassador'): ?>

							<?php if ($result['church']==$_SESSION['church']): ?>
								<td>
									<form method="post">
										<button name="delete" onclick="return confirm('Are you sure you want to Delete this Event')">Delete</button>
										<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
									</form>
								</td>

							<?php endif ?>
								
						<?php endif ?>
				</tr>
			<?php
		}

	 ?>
	
</table>



<script type="text/javascript" src="table.js"></script>


