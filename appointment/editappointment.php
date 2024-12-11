<?php include 'appointment_header.php'; ?>


<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>


<center><h1>Edit appointment</h1></center>

<?php 

	if (isset($_POST['name'])) {
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$date=(isset($_POST['date'])&&$_POST['date']!='')?$_POST['date']:NULL;
		$time=(isset($_POST['time'])&&$_POST['time']!='')?$_POST['time']:NULL;
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$fromwhere=mysqli_real_escape_string($connect,(isset($_POST['fromwhere'])&&$_POST['fromwhere']!='')?$_POST['fromwhere']:NULL);
		$mainneed=mysqli_real_escape_string($connect,(isset($_POST['mainneed'])&&$_POST['mainneed']!='')?$_POST['mainneed']:NULL);
		
		
		
		$id=$_GET['id'];

		
		if ($date!='' && $time!='') {
			$query=run("select * from appointment where date=$date and time='$time' and id!='$id'");
			if (mysqli_num_rows($query)==0) {
				run("update appointment set name='$name', date='$date', time='$time', phone='$phone', fromwhere='$fromwhere', mainneed='$mainneed' where id=$id");
				echo "<b style='color:green'><center>Appointment is updated successfully</center></b>";	

				header("location:appointment_details.php?id=$id");
				die();

			}else{
				echo "<b style='color:red'>ERROR: There is another appointment at the same time and date. Please change the time or date";
			}
		}elseif($date=='' && $time==''){
			run("update appointment set name='$name', date=NULL, time=NULL, phone='$phone', fromwhere='$fromwhere', mainneed='$mainneed' where id=$id");
				echo "<b style='color:green'><center>Appointment is updated successfully</center></b>";	
				header("location:appointment_details.php?id=$id");
				die();
		}elseif($time==''){
			run("update appointment set name='$name', date='$date', time=NULL, phone='$phone', fromwhere='$fromwhere', mainneed='$mainneed' where id=$id");
				echo "<b style='color:green'><center>Appointment is updated successfully</center></b>";	
				header("location:appointment_details.php?id=$id");
				die();
		}elseif($date==''){
			run("update appointment set name='$name', date=NULL, time='$time', phone='$phone', fromwhere='$fromwhere', mainneed='$mainneed' where id=$id");
				echo "<b style='color:green'><center>Appointment is updated successfully</center></b>";	
				header("location:appointment_details.php?id=$id");
				die();
		}

	}

 ?>
		


<form method="post">
	<table>
			<tr id="tableheading"></tr>
			<tr>
				<th>Name: &emsp;</th>
				<td><input type="text" name="name" placeholder="Name" required value="<?php if(isset($_GET['name'])) echo htmlspecialchars($_GET['name']) ?>"></td>
			</tr>
			<tr>
				<th>Phone number: &emsp;</th>
				<td><input type="text" name="phone" placeholder="Phone number" required value="<?php if(isset($_GET['phone'])) echo htmlspecialchars($_GET['phone']) ?>"> </td>
				
			</tr>
			<tr>
				<th>Date: &emsp;</th>
				<td><input type="date" name="date" value="<?php if(isset($_GET['date'])) echo $_GET['date'] ?>"></td>
				
			</tr>
			<tr>

				<th>Time: &emsp;</th>
				<td><input type="time" name="time"  value="<?php echo $_GET['time'] ?>"></td>
				
			</tr>
			<tr>
				<th>From: &emsp;</th>
				<td><input type="text" name="fromwhere"  value="<?php echo htmlspecialchars($_GET['fromwhere']) ?>" placeholder="From"></td>
			</tr>
			<tr>
				<th>Main need: &emsp;</th>
				<td><input type="text" name="mainneed" list="mainneed" value="<?php echo htmlspecialchars($_GET['mainneed']) ?>" placeholder='Main need'></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="submit"></td>
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
