<?php include 'appointment_header.php'; ?>

<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])&&$_SESSION['status']=='admin') {
		}else if(isset($_SESSION['id'])&&$_SESSION['status']=='user'){
			$id=$_SESSION['id'];
			header("location:appointment_details.php?id=$id");
		}else header("location:signin.php");
	}


 ?>



<?php 

	$date=date('Y-m-d');

	

	if (isset($_GET['day'])) {
		
		$steps=$_GET['day']-date('w',strtotime($date));
		$increment=strtotime($date."$steps day");
		
		
		$date=date('Y-m-d',$increment);
	}

	$day=date('w',strtotime($date));
	$month=date('m',strtotime($date));
		if (isset($_GET['month'])) {
			$month=$_GET['month'];
		}
	$year=date('Y',strtotime($date));
		if (isset($_GET['year'])) {
			$year=$_GET['year'];
		}
	if (isset($_GET['filter'])) {
		$month=date('m',strtotime($_GET['filter']));
		$year=date('Y',strtotime($_GET['filter']));
	}

	$sunday=date('Y/m/d',strtotime($date. "-$day day"));
	$saturday=date('Y/m/d',strtotime($sunday. "6 day"));





 ?>

<div class="filter">
		<form>
			<input type="month" name="filter" value="<?php if(isset($_GET['filter'])) echo $_GET['filter'] ?>" required>
			<input type="submit" name="" value="Apply filter" class="submit">
		</form>
</div>
<br>
<div>
	<center>
		<?php if (!isset($_GET['s'])): ?>
			<a href="?month=<?php if (isset($month)) echo $month ?>&year=<?php echo $year-1; ?>"><b><<&emsp;</b></a>
				Year: <b><?php echo $year; ?></b>
			<a href="?month=<?php if (isset($month)) echo $month ?>&year=<?php echo $year+1; ?>"><b>&emsp;>></b></a>
		<?php endif ?>
		
	</center>


</div>














<br>
<?php 
	if (isset($_GET['filter'])) {
		$filter=$_GET['filter'];
	}
 ?>

<table class="weekdays" style="background-color: ffe; padding: 0;" >
	<tr>

		<td>
			<a href="?month=1<?php if(isset($year)) echo "&year=$year" ?>"><span id="january">January</span></a>
		</td>
		<td>
			<a href="?month=2<?php if(isset($year)) echo "&year=$year" ?>"><span id="february">February</span></a>
		</td>
		<td>
			<a href="?month=3<?php if(isset($year)) echo "&year=$year" ?>"><span id="march">March</span></a>
		</td>
		<td>
			<a href="?month=4<?php if(isset($year)) echo "&year=$year" ?>"><span id="april">April</span></a>
		</td>
		<td>
			<a href="?month=5<?php if(isset($year)) echo "&year=$year" ?>"><span id="may">May</span></a>
		</td>
		<td>
			<a href="?month=6<?php if(isset($year)) echo "&year=$year" ?>"><span id="june">June</span></a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="?month=7<?php if(isset($year)) echo "&year=$year" ?>"><span id="july">July</span></a>
		</td>
		<td>
			<a href="?month=8<?php if(isset($year)) echo "&year=$year" ?>"><span id="august">August</span></a>
		</td>
		<td>
			<a href="?month=9<?php if(isset($year)) echo "&year=$year" ?>"><span id="september">September</span></a>
		</td>
		<td>
			<a href="?month=10<?php if(isset($year)) echo "&year=$year" ?>"><span id="october">October</span></a>
		</td>
		<td>
			<a href="?month=11<?php if(isset($year)) echo "&year=$year" ?>"><span id="november">November</span></a>
		</td>
		<td>
			<a href="?month=12<?php if(isset($year)) echo "&year=$year" ?>"><span id="december">December</span></a>
		</td>

	</tr>
</table>
<br>



<div>
<div id="scheduleday"><?php

		
	if (!isset($_GET['s'])) {
			switch ($month) {
				case '1':
					echo 'January';
					break;

				case '2':
					echo "February";
					break;

				case '3':
					echo "March";
					break;

				case '4':
					echo "April";
					break;
				case '5':
					echo "May";
					break;

				case '6':
					echo "June";
					break;
				case '7':
					echo "July";
					break;
				case '8':
					echo "August";
					break;
				case '9':
					echo "September";
					break;
				case '10':
					echo "October";
					break;
				case '11':
					echo "November";
					break;
				case '12':
					echo "December";
					break;
				
				default:
					// code...
					break;
			}
	}
		
		$weekday=date('w',strtotime($date));

 ?></div>
</div>




<div id="print">
<table  rules="all" >

	<?php if (isset($_GET['s'])): ?>
		<caption class="scheduledate">
			<?php echo "Results for <b>".htmlspecialchars($_GET['s'])."<b>";?>
		</caption>

	<?php endif ?>




	<tr>
		
		<!-- <th class='date'>Date</th> -->
		<th>Day</th>
		<th>Date</th>
		<th>Time</th>
		<th>Name</th>
		<th>Phone Number</th>
		<th>From</th>
		<th>Main need</th>
		<th>Remarks</th>
		
		<!-- <th class="day">day</th> -->
		<th></th>
		
	</tr>
	
	<?php 
		
		
		$query=run("select * from appointment where month(date)=$month and year(date)=$year or date is null order by date");
		
		


		if (isset($_GET['s'])) {
			$s=mysqli_real_escape_string($connect,$_GET['s']);
			$query=run("select * from appointment where name like '%$s%' or remarks like '%$s%' or fromwhere like '%$s%' or mainneed like '%$s%' or date like '%$s%' order by date desc");
		}

		if (mysqli_num_rows($query)==0) {
			?><tr><td colspan="100%" ><center>There are nothing to show here</center></td></tr><?php
		}

		while ($result=mysqli_fetch_array($query)) {
			?>
				<tr class="tablehover">
					<td>
						<?php day($result['date']); ?>
					</td>
					<td class="date">
						<?php if($result['date'])echo $result['date']; else echo "<b style='color:red'>Not set"; ?>
					</td>
					<td>
						<?php if($result['time'])echo $result['time']; else echo "<b style='color:red'>Not set"; ?>
					</td>
					<td class="name">
						<?php echo htmlspecialchars($result['name']) ?>
					</td>
					<td>
						<?php echo htmlspecialchars($result['phone']) ?>
					</td>
					<td>
						<?php echo htmlspecialchars($result['fromwhere']) ?>
					</td>
					<td>
						<?php echo htmlspecialchars($result['mainneed']) ?>
					</td>
					<td>
						<?php if ($result['remarks']): ?>
							<?php echo $result['remarks'] ?>
							
						<?php else: ?>
							<?php echo '-To be confirmed. ' ?>
							

						<?php endif ?>

						
					</td>
					
					<td>
						<a href="appointment_details.php?id=<?php echo $result['id'] ?>">More </a>
					</td>

					
					
						<!-- <?php if (isset($_SESSION['status'])&&$_SESSION['status']=='ambassador'): ?>

							<?php if ($result['church']==$_SESSION['church']): ?>
								<td>
									<form method="post">
										<button name="delete" onclick="return confirm('Are you sure you want to Delete this Event')">Delete</button>
										<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
									</form>
								</td>

							<?php endif ?>
								
						<?php endif ?> -->


					
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
 <title>Appointments <?php if(!isset($_GET['s'])) echo $year."-".$month; ?></title>
</div>



<br>
<center><button class="submit" onclick="printtag('print')">Print</button></center>

<br>
<br>



<script type="text/javascript" >
	
function weekdays(){
	var scheduleday=document.getElementById('scheduleday');
	var alldays=document.getElementsByTagName('td')
	switch (scheduleday.textContent){
		case 'January':
			var daytohighlight=document.getElementById('january');
			break;
		case 'February':
			var daytohighlight=document.getElementById('february');
			break;
		case 'March':
			var daytohighlight=document.getElementById('march');
			break;
		case 'April':
			var daytohighlight=document.getElementById('april');
			break;
		case 'May':
			var daytohighlight=document.getElementById('may');
			break;
		case 'June':
			var daytohighlight=document.getElementById('june');
			break;
		case 'July':
			var daytohighlight=document.getElementById('july');
			break;
		case 'August':
			var daytohighlight=document.getElementById('august');
			break;
		case 'September':
			var daytohighlight=document.getElementById('september');
			break;
		case 'October':
			var daytohighlight=document.getElementById('october');
			break;
		case 'November':
			var daytohighlight=document.getElementById('november');
			break;
		case 'December':
			var daytohighlight=document.getElementById('december');
			break;
		default:
			var daytohighlight=0;
			break;
	}
	if (daytohighlight!=0) {
		daytohighlight.style.backgroundColor='#83d';
		daytohighlight.style.color='white';
	}	
}
weekdays();

function table(){
	var tr=document.getElementsByTagName('tr');
	tr[2].style.backgroundColor='#777';
	tr[2].style.color='#eee';
	
	for(var i=3;i<tr.length;i++){
		
		if ((i%2)==1) {
			tr[i].style.backgroundColor='#ccc';
		}
	}

}

table();

</script>


<style type="text/css">
	
	th{
		padding-left: 10px;
		padding-right: 10px;
	}
</style>


<?php 


function day($resultdate){
	
	if ($resultdate!=NULL) {
				
		switch (date('w',strtotime($resultdate))) {
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
				
				break;
		}
	}
}



 ?>


 <script type="text/javascript" src="html2pdf.js"></script>
 <script type="text/javascript" src="script.js"></script>

 <script type="text/javascript">
 		
 	function printtag(id){
 		printcontent=document.getElementById(id).innerHTML;
 		originalcontent=document.body.innerHTML;

 		document.body.innerHTML=printcontent;

 		window.print();

 		document.body.innerHTML=originalcontent;
 	}

 </script>

