<?php include 'appointment_header.php'; ?>

<?php 
	if (basename($_SERVER['PHP_SELF'])!='signin.php'){
		if (isset($_SESSION['id'])) {
		}else header("location:signin.php");
	}

 ?>


<title>Kitimoto - Profile</title>



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
		<th>
			Name:
		</th>
		<td>
			<span style="text-transform: capitalize;">
				<?php echo $_SESSION['name']?>
			</span>
		</td>
	</tr>
	
	

</table>






<br><br>
<center >
	<a href="changepassword.php" class="submit">Change password</a> |
	<a href="signout.php" class="submit">Sign out</a>	
</center>

<script type="text/javascript" src="table.js"></script>