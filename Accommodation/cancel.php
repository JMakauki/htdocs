<?php 
include 'header.php';

if (isset($_GET['id']) && isset($_GET['r'])) {
	$id=$_GET['id'];
	$r=$_GET['r'];
	run("delete from allocation where id='$id'");
	header("location:view.php?r=$r ");
}


 ?>