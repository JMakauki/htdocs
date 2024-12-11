<?php 

$connect=mysqli_connect("localhost","root","","accommodation");
function run($sql){
		$connect=mysqli_connect("localhost","root","","accommodation");
		$query=mysqli_query($connect,$sql);
		echo mysqli_error($connect);
		return $query;
}

 ?>