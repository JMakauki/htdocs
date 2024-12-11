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


<br>

<br>
<?php 
	if (isset($_GET['filter'])) {
		$filter=$_GET['filter'];
	}
 ?>

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
		
		
		
		<th>Name</th>
		<th>Phone Number</th>
		<th>Location</th>
		<th>Amount</th>
		<th>Remarks</th>
		<th>Payment</th>

		
		<!-- <th class="day">day</th> -->
		<th></th>
		
	</tr>
	
	<?php 
		
		
		$query=run("select * from orders order by remarks");
		
		
		if (isset($_GET['s'])) {
			$s=mysqli_real_escape_string($connect,$_GET['s']);
			$query=run("select * from orders where name like '%$s%' or remarks like '%$s%' or location like '%$s%' or phone like '%$s%' or amount like '%$s%' or paid like '%$s%' order by remarks");
		}

		if (mysqli_num_rows($query)==0) {
			?><tr><td colspan="100%" ><center>There are nothing to show here</center></td></tr><?php
		}

		$total=0;
		while ($result=mysqli_fetch_array($query)) {
			?>
				<tr class="tablehover">
					<td>
						<?php echo $result['name']; ?>
					</td>
					<td class="date">
						<?php if($result['phone'])echo $result['phone']; else echo "<b style='color:red'>Not set"; ?>
					</td>
					<td>
						<?php if($result['location'])echo $result['location']; else echo "<b style='color:red'>Not set"; ?>
					</td>
					<td class="name">
						<?php echo htmlspecialchars($result['amount']);$amount=$result['amount']; $total+=intval($amount); ?>
					</td>
					
					<td>
						<?php if ($result['remarks']): ?>
							<?php echo $result['remarks'] ?>
							
						<?php else: ?>
							<?php echo "<b style='color: red'>Not delivered</b>" ?>
							

						<?php endif ?>

						
					</td>

					<td>
						<?php if ($result['paid']): ?>
							<?php echo $result['paid'] ?>
							
						<?php else: ?>
							<?php echo "<b style='color: red'>Not paid</b>" ?>
							

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
<caption class="scheduledate"><b><?php echo 'Total: '.$total.' kg' ?></b></caption>
	
</table>
 <title>Kitimoto - Orders</title>
</div>



<br>
<center><button class="submit" onclick="printtag('print')">Print</button></center>

<br>
<br>



<script type="text/javascript" >
	

function table(){
	var tr=document.getElementsByTagName('tr');
	tr[0].style.backgroundColor='#777';
	tr[0].style.color='#eee';
	
	for(var i=1;i<tr.length;i++){
		
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

