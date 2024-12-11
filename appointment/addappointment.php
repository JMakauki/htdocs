
<?php include 'appointment_header.php'; ?>


<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>



<center><h1>Add appointment</h1></center>

<?php 

	if (isset($_POST['name'])) {
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$date=((isset($_POST['date'])&&$_POST['date']!='')?$_POST['date']:"");
		$time=((isset($_POST['time'])&&$_POST['time']!='')?$_POST['time']:"");
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$fromwhere=mysqli_real_escape_string($connect,(isset($_POST['fromwhere']))?$_POST['fromwhere']:"");
		$mainneed=mysqli_real_escape_string($connect,(isset($_POST['mainneed']))?$_POST['mainneed']:"");
		$remarks=mysqli_real_escape_string($connect,(isset($_POST['remarks']))?$_POST['remarks']:"");
		$user=((isset($_SESSION['id'])&&$_SESSION['status']=='user')?$_SESSION['id']:"");

		
		if ($date!='' && $time!='') {
			$query=run("select * from appointment where date='$date' and time='$time'");
			if (mysqli_num_rows($query)==0) {
				run("insert into appointment (id,name,date,time,remarks,phone,fromwhere,mainneed,user) values ('','$name','$date','$time','$remarks','$phone','$fromwhere','$mainneed','$user')");
				echo "<b style='color:green'>Appointment is added successfully</b>";
				?>
					<script type="text/javascript">
						alert('Success: One appointment is added');
						location.assign("../appointment");
					</script>
				<?php
				// header("location:../appointment");
				die();
			}else{
				echo "<b style='color:red'>ERROR: There is another appointment at the same time and date. Please change the time or date</b>";
			}
		}elseif($date=='' && $time==''){
			run("insert into appointment (id,name,remarks,phone,fromwhere,mainneed,user) values ('','$name','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is added successfully</b>";
			?>
					<script type="text/javascript">
						alert('Success: One appointment is added');
						location.assign("../appointment");
					</script>
				<?php
			// header("location:../appointment");

			die();
		}elseif($time==''){
			run("insert into appointment (id,name,date,remarks,phone,fromwhere,mainneed,user) values ('','$name','$date','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is added successfully</b>";
			?>
					<script type="text/javascript">
						alert('Success: One appointment is added');
						location.assign("../appointment");
					</script>
				<?php
			// header("location:../appointment");
			die();
		}elseif($date==''){
			run("insert into appointment (id,name,time,remarks,phone,fromwhere,mainneed,user) values ('','$name','$time','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is added successfully</b>";
			?>
					<script type="text/javascript">
						alert('Success: One appointment is added');
						location.assign("../appointment");
					</script>
				<?php
			// header("location:../appointment");
			die();
		}

	}

 ?>
		
<?php 	$name=$_SESSION['fname']." ".$_SESSION['lname']; ?>
<?php 	$phone=$_SESSION['phone']; ?>

<form method="post">
	<table>
			<tr id="tableheading"></tr>
			<tr>
				
				
				
				<th>Name: &emsp;</th>
				<td><input style="text-transform: capitalize;" type="text" name="name" placeholder="Name" required value="<?php if(isset($_GET['name'])) echo $_GET['name']; else if($_SESSION['status']=='user') echo $name; ?>"></td>
			</tr>
			<tr>
				<th>Phone number: &emsp;</th>
				<td><input type="text" name="phone" placeholder="Phone number" required value="<?php if(isset($_GET['phone'])) echo $_GET['phone']; else if($_SESSION['status']=='user') echo $phone; ?>"> </td>
				
			</tr>
			<tr>
				<th>Date: &emsp;</th>
				<td><input type="date" name="date" value="<?php if(isset($_GET['date'])) echo $_GET['date'] ?>"></td>
				
			</tr>
			<tr>
				<th>Time: &emsp;</th>
				<td><input type="time" name="time"  value="<?php if(isset($_GET['time'])) echo $_GET['time'] ?>"></td>
				
			</tr>
			<tr>
				<th>From: &emsp;</th>
				<td><input type="text" name="fromwhere"  value="<?php if (isset($_GET['fromwhere'])) echo $_GET['fromwhere'] ?>" placeholder="Where are you from" title="Where are you from"></td>
			</tr>
			<tr>
				<th>Main need: &emsp;</th>
				<td><input type="text" name="mainneed"  value="<?php  if (isset($_GET['fromwhere']))echo $_GET['mainneed'] ?>" placeholder='Main need' list="mainneed"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="submit" value="Submit"></td>
			</tr>
			
		</table>
		
</form>

<datalist id="mainneed">
	<option>Deliverance</option>
	<option>Ushauri</option>
	<option>Spiritual advice</option>
	<option>Kufunguliwa</option>
</datalist>


<style type="text/css">
	th{
		text-align: right;
		padding: 10px;
		background-color: #bbb;
		width: 30%;
	}
</style>
<link rel="stylesheet" type="text/css" href="appointment.css">
 <script type="text/javascript" src="table.js"></script>