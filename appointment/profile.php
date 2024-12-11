<?php include 'appointment_header.php'; ?>

<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>


<title>CSS - Profile</title>



<?php 

if (isset($_SESSION['id'])) {} 
else {
	header('location: signin.php'); die();
}
 ?>

<center><h2>My Profile </h2> </center>

<table border="1" rules="all">
	<tr id="tableheading"></tr>
	<tr>
		<td>
			Name:
		</td>
		<td>
			<span style="text-transform: capitalize;">
				<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
			</span>
		</td>
	</tr>
	<tr>
		<td>
			Email:
		</td>
		<td>
			<?php echo $_SESSION['email'] ?>
		</td>
	</tr>
	<tr>
		<td>
			Phone no:
		</td>
		<td>
			<?php echo $_SESSION['phone'] ?>
		</td>
	</tr>


	

</table>






<br><br>
<center >
	<a href="changepassword.php" class="submit">Change password</a> |
	<a href="signout.php" class="submit">Sign out</a>	
</center>

<script type="text/javascript" src="table.js"></script>