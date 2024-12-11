<title>CSS - Change password</title>



<?php include 'church_header.php'; ?>


<?php 

	if (!isset($_SESSION['id'])) {
		header('location:signin.php');
		die();
	}

	if (isset($_POST['submit'])) {
		
		$id=$_SESSION['id'];

		$oldpassword=mysqli_real_escape_string($connect,sha1($_POST['oldpassword']));
		$newpassword=mysqli_real_escape_string($connect,sha1($_POST['newpassword']));
		$confirmpassword=mysqli_real_escape_string($connect,sha1($_POST['confirmpassword']));


		$query=run("select * from user where id='$id' and password='$oldpassword' ");

		if (mysqli_num_rows($query)) {
			if ($newpassword==$confirmpassword) {
				run("update user set password='$newpassword' where id='$id'");
				die("<p><b><center style='color:green;'>Password changed successfully</center></b>");
			}else{
				echo "<p><b><center style='color:red;'>New passwords did not match</center></b>";
			}

		}else{
			echo "<p><b><center style='color:red;'>Incorrect Old password</center></b>";
		}




	}




 ?>



<h2>Change password</h2>

<form method="post">
	<input type="password" name="oldpassword" placeholder="Old password" required><br>
	<input type="password" name="newpassword" placeholder="New password" required><br>
	<input type="password" name="confirmpassword" placeholder="Confirm new password" required><br>
	<input type="submit" name="submit" class="submit">
</form>
