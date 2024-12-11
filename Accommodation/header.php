<head>
	<link rel="icon" href="home.jpg">
</head>

<header>
<div class="header">

<?php 
	include 'dbconnect.php';
	
	session_start();

	$minutesBeforeSessionExpire=10;
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
    	session_unset();     // unset $_SESSION   
    	session_destroy();   // destroy session data  
	}
	$_SESSION['LAST_ACTIVITY'] = time();

	
	if (!isset($_SESSION['id'])) {
		header('location:signin.php');
	}


	$s1=fopen('semester1.txt', 'r');
	

	$semester1=fread($s1, filesize('semester1.txt'));
	



	fclose($s1);
	


	

?>


<link rel="stylesheet" type="text/css" href="accommodation.css?v=2">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">




<br>
<center><h1>Student Accommodation Management System</h1></center>


<nav>
	<a href="../Accommodation">Dashboard</a> &nbsp
	<a href="semester.php">Semester info</a> &nbsp
	<a href="Profile.php">Profile</a> &nbsp
	

	<?php if(isset($_SESSION['name'])){ ?>
		<a href="SignOut.php">Sign out</a> &nbsp
	<?php } ?>

</nav>

<nav style="text-align: right;">
	<a href="profile.php" style="text-transform: capitalize;">
	<?php if (isset($_SESSION['name'])) {
		echo $_SESSION['name'].' ('.$_SESSION['status'].')';
	} ?>
	</a>
</nav>

</div>
</header>

