<?php 
include 'appointment_header.php';

if (isset($_GET['date'])) {
	$date=mysqli_real_escape_string($connect,$_GET['date']);
	$time=mysqli_real_escape_string($connect,$_GET['time']);
	$id=mysqli_real_escape_string($connect,$_GET['id']);
	run("update appointment set remarks='Postponed to $date' where id='$id'" );
	$query=run("select * from appointment where id=$id");
	$result=mysqli_fetch_array($query);


		$name=$result['name'];
		
		$time=(isset($result['time'])&&$result['time']!='')?$result['time']:"";
		$phone=$result['phone'];
		$fromwhere=(isset($result['fromwhere']))?$result['fromwhere']:"";
		$mainneed=(isset($result['mainneed']))?$result['mainneed']:"";
		$remarks="";
		$user=(isset($result['user']))?$result['user']:"";
		
		
		if ($date!='' && $time!='') {
			$query=run("select * from appointment where date='$date' and time='$time'");
			if (mysqli_num_rows($query)==0) {
				run("insert into appointment (id,name,date,time,remarks,phone,fromwhere,mainneed,user) values ('','$name','$date','$time','$remarks','$phone','$fromwhere','$mainneed','$user')");
				echo "<b style='color:green'>Appointment is postponed successfully</b>";	
				header("location:appointment_details.php?id=$id");
				die();
			}else{
				echo "<b style='color:red'>ERROR: There is another appointment at the same time and date. Please change the time or date</b>";
			}
		}elseif($date=='' && $time==''){
			run("insert into appointment (id,name,remarks,phone,fromwhere,mainneed,user) values ('','$name','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is postponed successfully</b>";
			header("location:appointment_details.php?id=$id");
			die();
		}elseif($time==''){
			run("insert into appointment (id,name,date,remarks,phone,fromwhere,mainneed,user) values ('','$name','$date','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is postponed successfully</b>";
			header("location:appointment_details.php?id=$id");
			die();
		}elseif($date==''){
			run("insert into appointment (id,name,time,remarks,phone,fromwhere,mainneed,user) values ('','$name','$time','$remarks','$phone','$fromwhere','$mainneed','$user')");
			echo "<b style='color:green'>Appointment is postponed successfully</b>";
			header("location:appointment_details.php?id=$id");
			die();
		}
	
}


if (isset($_GET['r'])) {
	$id=mysqli_real_escape_string($connect,$_GET['id']);
	$remarks=mysqli_real_escape_string($connect,$_GET['r']);
	run("update orders set remarks='$remarks' where id='$id'");
	
	header("location:appointment_details.php?id=$id");
}else if(isset($_GET['date'])){
		?>
			<form style="width:500px">
				<h2>Postpone to:</h2>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="date" min="<?php echo date('Y-m-d') ?>" name="date" required>
				<input type="time" name="time" >
				<input type="submit" name="" class="submit">
			</form>
		<?php
	}

if (isset($_GET['p'])) {
	$id=mysqli_real_escape_string($connect,$_GET['id']);
	$paid=mysqli_real_escape_string($connect,$_GET['p']);
	run("update orders set paid='$paid' where id='$id'");
	
	header("location:appointment_details.php?id=$id");
}	


 ?>