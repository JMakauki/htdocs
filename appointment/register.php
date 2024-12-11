<title>Sign up</title>
<?php include 'appointment_header.php'; ?>




	<center><h2>Sign up</h2></center>







<?php 
	if (isset($_POST['submit'])) {

		$fname=mysqli_real_escape_string($connect,$_POST['fname']);
		$lname=mysqli_real_escape_string($connect,$_POST['lname']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$phone=mysqli_real_escape_string($connect,$_POST['phone']);
		$password=mysqli_real_escape_string($connect,sha1($_POST['password']));

		if(isset($_POST['status']))$status=mysqli_real_escape_string($connect,$_POST['status']);
		else $status='user';
	

		$query=run("select * from user where email='$email'");

		if (!mysqli_num_rows($query)) {
			if (isset($_SESSION['status'])&&$_SESSION['status']=='admin') {
				if($status=='user'){
					
					run("insert into user values('$fname','$lname','$email','$phone','$password','$status','')");
					echo "<b><center style='color:green;'>A normal user is successfully added</center></b><br>";
				}
				else{
					run("insert into user(fname,lname,email,phone,password,status,id) values('$fname','$lname','$email','$phone','$password','$status','')");
					echo "<b><center style='color:green;'>An Admin is successfully added</center></b><br>";	

				}

			}else{
				
				run("insert into user values('$fname','$lname','$email','$phone','$password','$status','')");
				echo "<b><center style='color:green;'>A user account is successfully created</center></b><br>";
				?><br><br><center><a class="submit" href="signin.php">Sign in</a></center><?php
				die();
			}
		}else{
			echo "<b><center style='color:red;'>ERROR: There is another user with the same email. Please try another email</center></b><br>";

		} 
			

		
	}

 ?>



<form method="post" onsubmit="">
	<table>
			<tr id="tableheading"></tr>
			<tr>
				<th>First name: &emsp;</th>
				<td><input type="text" name="fname" placeholder="First name" required></td>
			</tr>
			<tr>
				<th>Last name: &emsp;</th>
				<td><input type="text" name="lname" placeholder="Last name" required> </td>
				
			</tr>
			<tr>
				<th>Email: &emsp;</th>
				<td><input type="email" name="email" placeholder="Email" required></td>
				
			</tr>
			<tr>

				<th>Phone number: &emsp;</th>
				<td><input type="tel" name="phone" placeholder="Phone number" required></td>
				
			</tr>
			<tr>
				<th>Password: &emsp;</th>
				<td><input type="password" name="password" placeholder="Password" required id="p"></td>
			</tr>
			<tr>
				<th>Confirm password: &emsp;</th>
				<td><input type="password" name="confirmpassword" placeholder="Re-enter password" id="cp"  required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="submit" name="submit" value="Sign up" onclick="return check('p','cp')"></td>
			</tr>
			
		</table>
		
</form>



<style type="text/css">
	th{
		width: 100px;
	}

</style>






<script type="text/javascript">
	
	function check(password,confirmpassword){
		p=document.getElementById(password);
		cp=document.getElementById(confirmpassword);

		if(p.value!=cp.value){
			alert("Passwords do not match!  \nMake sure that the two password fields match.");
			return false;
		}
		return true;
	}
</script>
