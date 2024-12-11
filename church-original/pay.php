<title>Pay</title>
<?php include 'church_header.php'; ?>





<?php if (!isset($_SESSION['status'])) {
	die("<center style='color:red'>Access denied</center>");
} ?>

<?php 

if (!isset($_GET['b']) || !isset($_GET['c'])) {
	die();
}

$b=$_GET['b'];
$c=$_GET['c'];


if (isset($_GET['submit'])) {
	$amount=$_GET['amount'];
	run("insert into payment (believer,contribution,amount) values ('$b','$c','$amount')");
	header("location:contributions.php");

}

 ?>


 <form>

 	<input type="hidden" name="b" value="<?php echo $b ?>">
 	<input type="hidden" name="c" value="<?php echo $c ?>">

 	<label>Amount: </label>
 	<input type="number" name="amount" required>&emsp;
 	<input type="submit" name="submit">
 </form>