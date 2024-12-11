
<?php 
	
	session_start();

	$minutesBeforeSessionExpire=30;
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
    	session_unset();     // unset $_SESSION   
    	session_destroy();   // destroy session data  
	}
	$_SESSION['LAST_ACTIVITY'] = time();

?>

<?php include 'dbconnect.php'; ?>
<link rel="stylesheet" type="text/css" href="appointment.css">






<header>
<div>
<nav>
	<a href="../appointment">View appointments</a>
	<a href="addappointment.php">Add appointment</a>

	<?php if (!isset($_SESSION['id'])): ?>
		<a href="signin.php" id="signin">Sign in</a>&emsp;
		<a href="register.php" id="signup">Sign up</a>	
	<?php endif ?>

	<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin') { ?>
		<a href="viewusers.php">Users</a>
	<?php } ?>

	<?php if (isset($_SESSION['status']) ) { ?>
		<a href="profile.php">Profile</a>
	<?php } ?>


	<form class="search" action="../appointment">
		<input type="text" name="s" placeholder="Search appointments..." required value="<?php if(isset($_GET['s'])) echo htmlspecialchars($_GET['s']) ?>">
		<input type="submit" name="" value="Search" class="submit">
	</form>

</nav>

</div>
</header>

<?php 


 ?>



<br><br>