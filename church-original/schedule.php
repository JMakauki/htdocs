<?php include 'church_header.php'; ?>

<title>CSS - Schedule</title>



<?php 

	$date=date('Y-m-d');

	if (isset($_GET['filter'])) {
		$date=$_GET['filter'];
	}

	if (isset($_GET['day'])) {
		
		$steps=$_GET['day']-date('w',strtotime($date));
		$increment=strtotime($date."$steps day");
		
		
		$date=date('Y-m-d',$increment);
	}

	$day=date('w',strtotime($date));
	$sunday=date('Y/m/d',strtotime($date. "-$day day"));
	$saturday=date('Y/m/d',strtotime($sunday. "6 day"));




 ?>


<br>
<div>
	<center>
	
		Schedule for <b><?php echo $sunday.'</b> to <b>'.$saturday; ?></b>
	</center>


</div>



<?php if (isset($_SESSION['status']) && $_SESSION['status']=='ambassador'): ?>
	<a href="addevent.php">Add event</a>
<?php endif ?>

<?php 

	if (isset($_POST['delete'])) {
		$id=$_POST['id'];
		run("delete from schedule where id='$id'");
	}
 ?>





<div class="filter">
		<form>
			<input type="date" name="filter" value="<?php if(isset($_GET['filter'])) echo $_GET['filter'] ?>" required>
			<input type="submit" name="" value="Apply filter" class="submit">
		</form>
</div>


<br>
<?php 
	if (isset($_GET['filter'])) {
		$filter=$_GET['filter'];
	}
 ?>

<table class="weekdays" style="background-color: fef; padding: 0;">
	<tr>

		<td>
			<a href="?day=0<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="sunday">Sunday</span></a>
		</td>
		<td>
			<a href="?day=1<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="monday">Monday</span></a>
		</td>
		<td>
			<a href="?day=2<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="tuesday">Tuesday</span></a>
		</td>
		<td>
			<a href="?day=3<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="wednesday">Wednesday</span></a>
		</td>
		<td>
			<a href="?day=4<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="thursday">Thursday</span></a>
		</td>
		<td>
			<a href="?day=5<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="friday">Friday</span></a>
		</td>
		<td>
			<a href="?day=6<?php if(isset($filter)) echo "&filter=$filter" ?>"><span id="saturday">Saturday</span></a>
		</td>

	</tr>
</table>
<br>



<div>
<div id="scheduleday"><?php

		

		switch (date('w',strtotime($date))) {
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
		$weekday=date('w',strtotime($date));

 ?></div>
</div>

<table  rules="all">

<?php if (isset($_GET['s'])): ?>
	<caption class="scheduledate" >
		<?php echo "Results for <b>".$_GET['s']."<b>";?>
	</caption>

<?php else: ?>
	<caption class="scheduledate" >
		Date: <?php echo $date;?>
	</caption>
<?php endif ?>




	<tr>
		<th>Time</th>
		<!-- <th class='date'>Date</th> -->
		<th>Event</th>
		<th>Church</th>
		<!-- <th class="day">day</th> -->
		<?php if (isset($_SESSION['status'])&&$_SESSION['status']=='ambassador'): ?>
			<th>Action</th>
		<?php endif ?>
	</tr>
	
	<?php 
		
		$query=run("select * from schedule where date='$date' or schedule.repeat='daily' or schedule.repeat='weekly' and weekday like '$weekday' order by time");


		if (isset($_GET['s'])) {
			$s=$_GET['s'];
			$query=run("select * from schedule join church on church.id=schedule.church where event like '%$s%' or church.name like '%$s%' or church.location like '%$s'");
		}

		if (mysqli_num_rows($query)==0) {
			?><tr><td colspan="100%" ><center>There are no events to show here</center></td></tr><?php
		}

		while ($result=mysqli_fetch_array($query)) {
			?>
				<tr>
					<td>
						<?php echo $result['time'] ?>
					</td>
					<!-- <td class="date">
						<?php echo $result['date'] ?>
					</td> -->
					<td>
						<?php echo $result['event'] ?>
					</td>
					<td>
						<?php 
							$churchid=$result['church'];
							$churchquery=run("select * from church where id='$churchid'");
							$churchresult=mysqli_fetch_array($churchquery);
							echo $churchresult['name']." (".$churchresult['location'].")";
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
					
					<!-- <td class="day">
						<?php 
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
						 ?>
					</td> -->
				</tr>
			<?php
		}

	 ?>
	
</table>



<script type="text/javascript" >
	
function weekdays(){
	var scheduleday=document.getElementById('scheduleday');
	var alldays=document.getElementsByTagName('td')
	switch (scheduleday.textContent){
		case 'Sunday':
			var daytohighlight=document.getElementById('sunday');
			break;
		case 'Monday':
			var daytohighlight=document.getElementById('monday');
			break;
		case 'Tuesday':
			var daytohighlight=document.getElementById('tuesday');
			break;
		case 'Wednesday':
			var daytohighlight=document.getElementById('wednesday');
			break;
		case 'Thursday':
			var daytohighlight=document.getElementById('thursday');
			break;
		case 'Friday':
			var daytohighlight=document.getElementById('friday');
			break;
		case 'Saturday':
			var daytohighlight=document.getElementById('saturday');
			break;
		default:
			
			break;
	}
	daytohighlight.style.backgroundColor='#d38';
	daytohighlight.style.color='white';
}
weekdays();

function table(){
	var tr=document.getElementsByTagName('tr');
	tr[1].style.backgroundColor='#777';
	tr[1].style.color='#eee';
	
	for(var i=2;i<tr.length;i++){
		
		if ((i%2)==1) {
			tr[i].style.backgroundColor='#ccc';
		}
	}

}

table();

</script>


