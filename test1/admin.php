<?php 
session_start();

if (!isset($_SESSION['name'])) {
	# code...
	header('location:test1.php');
}

$name=$_SESSION['name'];


echo "welcome ";
echo "$name";







 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>admin</title>
 </head>
 <body>



 	<h1>This is admin page</h1>
 
 </body>
 </html>