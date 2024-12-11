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
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$location=mysqli_real_escape_string($connect,(isset($_POST['location'])&&$_POST['location']!='')?$_POST['location']:NULL);
		$amount=mysqli_real_escape_string($connect,(isset($_POST['amount'])&&$_POST['amount']!='')?$_POST['amount']:NULL);
		$remarks=mysqli_real_escape_string($connect,(isset($_POST['remarks'])&&$_POST['remarks']!='')?$_POST['remarks']:NULL);
		$paid=mysqli_real_escape_string($connect,(isset($_POST['paid'])&&$_POST['paid']!='')?$_POST['paid']:NULL);
		
		
		
		$id=$_GET['id'];

			run("update orders set name='$name', location='$location', phone='$phone', amount='$amount', remarks='$remarks', paid='$paid' where id=$id");
				echo "<b style='color:green'><center>Order is updated successfully</center></b>";	
				header("location:appointment_details.php?id=$id");
				die();
		

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
				<th>Location: &emsp;</th>
				<td><input type="text" name="location"  value="<?php echo htmlspecialchars($_GET['location']) ?>" placeholder="Location" list='location'></td>
			</tr>
			<tr>
				<th>Amount: &emsp;</th>
				<td><input type="text" name="amount" list="amount" value="<?php echo htmlspecialchars($_GET['amount']) ?>" placeholder='Amount'></td>
			</tr>

			<tr>
				<th>Remarks: &emsp;</th>
				<td><input type="text" name="remarks" list="remarks" value="<?php echo htmlspecialchars($_GET['remarks']) ?>" placeholder='leave blank if NOT DELIVERED'></td>
			</tr>
			<tr>
				<th>Payment: &emsp;</th>
				<td><input type="text" name="paid" list="paid" value="<?php echo htmlspecialchars($_GET['paid']) ?>" placeholder='leave blank if NOT PAID'></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="submit"></td>
			</tr>
			
		</table>
		
</form>


<datalist id="paid">
	<option>Paid</option>

</datalist>

<datalist id="remarks">
	<option>Delivered</option>

</datalist>
<datalist id="location">
	<option>Kihonda- kwa chambo</option>
	<option>Bigwa</option>
	<option>Kola</option>
	<option>Mzumbe</option>
	<option>Mazimbu</option>
	<option>Azimio</option>
	<option>Kihonda- Bima</option>
	<option>Kilakala</option>
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
