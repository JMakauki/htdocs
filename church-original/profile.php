<title>CSS - Profile</title>

<?php include 'church_header.php'; ?>

<?php 

if (isset($_SESSION['id'])) {} 
else {
	header('location: signin.php'); die();
}
 ?>

<h2>My Profile </h2> 

<table border="1" rules="all">
	<tr id="tableheading"></tr>
	<tr>
		<td>
			Name:
		</td>
		<td>
			<span style="text-transform: uppercase;">
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

	<?php if ($_SESSION['status']=='ambassador' || $_SESSION['status']=='believer'): ?>
		<tr>
			<td>
				church:
			</td>
			<td>
				<?php 
					$churchid=$_SESSION['church'];
					$churchquery=run("select * from church where id='$churchid'");
					$churchresult=mysqli_fetch_array($churchquery);
					?><a href="churchdetails.php?id=<?php echo $churchid ?>"><?php
					echo $churchresult['name']." (".$churchresult['location'].")";
					?></a><?php
				?>
			</td>
		</tr>
	<?php endif ?>

	<tr>
		<td>
			Status:
		</td>
		<td style="text-transform:uppercase;">

			<?php echo $_SESSION['status'];

				if ($_SESSION['status']=='admin') {
					echo "istrator";
				}
			 ?>
		</td>
	</tr>

</table>






<br><br>

<a href="changepassword.php">Change password</a><br><br>

<a href="signout.php">Sign out</a>

<script type="text/javascript" src="table.js"></script>