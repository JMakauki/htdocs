<?php 

$connect=mysqli_connect("localhost","root","","church");
function run($sql){
		$connect=mysqli_connect("localhost","root","","church");
		$query=mysqli_query($connect,$sql);
		echo mysqli_error($connect);
		return $query;
}

 ?>