


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
	<h1><em><a href="../kitimoto">Kitimoto</a></em></h1>
	<div>
		<form class="search" action="../kitimoto">
			<input type="text" name="s" placeholder="Search orders..." required value="<?php if(isset($_GET['s'])) echo htmlspecialchars($_GET['s']) ?>">
			<input type="submit" name="" value="Search" class="submit">
		</form>
	</div>
<div class="menu" tabindex=0>
	<div href="" class="dropdown"  >
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
	</div>

	<nav >
		<a href="../kitimoto">Home</a>
		<a href="addappointment.php">Place order</a>

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


		

	</nav>

	</div>
</div>
</header>

<?php 


 ?>



<br><br><meta name="viewport" content="width=device-width, initial-scale=1" />