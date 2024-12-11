<?php 

$connect=mysqli_connect("localhost","root","","kitimoto");
function run($sql){
		$connect=mysqli_connect("localhost","root","","kitimoto");
		$query=mysqli_query($connect,$sql);
		echo mysqli_error($connect);
		return $query;
}

 ?>