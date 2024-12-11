<?php 

$connect=mysqli_connect("localhost","root","12345678","appointment");
function run($sql){
		$connect=mysqli_connect("localhost","root","12345678","appointment");
		$query=mysqli_query($connect,$sql);
		echo mysqli_error($connect);
		return $query;
}

 ?>