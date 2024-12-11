
<?php include 'appointment_header.php'; ?>


<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>



<center><h1>Place an order</h1></center>

<?php 

	if (isset($_POST['name'])) {
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$location=((isset($_POST['location'])&&$_POST['location']!='')?$_POST['location']:"");
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$amount=mysqli_real_escape_string($connect,(isset($_POST['amount']))?$_POST['amount']:"");
		$remarks=mysqli_real_escape_string($connect,(isset($_POST['remarks']))?$_POST['remarks']:"");
		$paid=mysqli_real_escape_string($connect,(isset($_POST['paid']))?$_POST['paid']:"");
		$user=((isset($_SESSION['id'])&&$_SESSION['status']=='user')?$_SESSION['id']:"");

		
			run("insert into orders values ('','$name','$phone','$location','$amount','$remarks','$paid')");
			echo "<b style='color:green'>An order is added successfully</b>";
			?>
					<script type="text/javascript">
						alert('Success: One order is added');
						location.assign("../kitimoto");
					</script>
				<?php
			// header("location:../appointment");
			die();
		

	}

 ?>
		


<form method="post">
	<table>
			<tr id="tableheading"></tr>
			<tr>
				
				
				
				<th>Name: &emsp;</th>
				<td><input style="text-transform: capitalize;" type="text" name="name" placeholder="Name" required ></td>
			</tr>
			<tr>
				<th>Phone number: &emsp;</th>
				<td><input type="text" name="phone" placeholder="Phone number" pattern="[+,0-9]+" required > </td>
				
			</tr>
			<tr>
				<th>Location: &emsp;</th>
				<td><input type="text" name="location" placeholder="Location" list="location"></td>
				
			</tr>
			<tr>
				<th>Amount (in Kg): &emsp;</th>
				<td><input type="text" name="amount"  placeholder="Amount (in Kg)"></td>
				
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="submit" value="Submit"></td>
			</tr>
			
		</table>
		
</form>

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