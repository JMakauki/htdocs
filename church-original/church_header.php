<head>
	<link rel="icon" href="home.jpg">
</head>

<?php 
	
	session_start();

	$minutesBeforeSessionExpire=10;
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
    	session_unset();     // unset $_SESSION   
    	session_destroy();   // destroy session data  
	}
	$_SESSION['LAST_ACTIVITY'] = time();

?>

<style type="text/css">
	
	
	
</style>

<?php include 'dbconnect.php'; ?>

<header>
	<div>
<h1 style="display: inline-block;">
	<a href="../church">CHURCH SERVICES SCHEDULES</a>
</h1>


<!-- SEARCH -->
	<form class="search" action="schedule.php">
		<input type="text" name="s" placeholder="Search schedule..." required value="<?php if(isset($_GET['s'])) echo $_GET['s'] ?>">
		<input type="submit" name="" value="Search" class="submit">
	</form>



<nav id="nav">
	<a href="../church">Home</a>
	<a href="schedule.php">Schedule</a>
	<a href="churches.php">Churches</a>
	<a href="about.php">About Us</a>
	
	

	<?php if (isset($_SESSION['status']) && $_SESSION['status']=='admin') { ?>
		<a href="viewusers.php">Users</a>
	<?php } ?>
	
	<?php if (isset($_SESSION['status']) && $_SESSION['status']=='ambassador') { ?>
		<a href="viewusers.php">Ambassadors</a>
	<?php } ?>

	<?php if (isset($_SESSION['status']) && ($_SESSION['status']=='ambassador' || $_SESSION['status']=='believer') ) { ?>
		<a href="contributions.php">Contributions</a>
	<?php } ?>



	



	

	<?php if (!isset($_SESSION['id'])): ?>
		<a href="signin.php" id="signin">Sign in</a>
		<a href="register.php" id="signup">Sign up</a>
	<?php endif ?>
	

	<?php if (isset($_SESSION['status']) ) { ?>
		<a href="profile.php">Profile</a>
	<?php } ?>
	
</nav>
</div>
</header>
<br>

<div class="content">


<link rel="stylesheet" type="text/css" href="church.css">