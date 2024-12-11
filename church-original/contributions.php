<title>Contributions</title>
<?php include 'church_header.php'; ?>

<?php if (!isset($_SESSION['status'])) {
	die("<center style='color:red'>Access denied</center>");
} ?>

<?php 
if ($_SESSION['status']!='believer' && $_SESSION['status']!='ambassador') {
	die();
}

 ?>







<?php 

$id=$_SESSION['id'];
$church=$_SESSION['church'];

$result1=mysqli_fetch_array(run("select * from church where id='$church'"));


$query=run("select * from contribution where church='$church' and deadline>date(current_timestamp)");

 ?>


 <table class="table" border="1" rules="all">

 	<caption id=""><h3><?php echo $result1['name'] ?> contributions</h3></caption>
 	<tr>
 		<th>S/N</th>
 		<th>Description</th>
 		<th>Deadline</th>
 		<?php if ($_SESSION['status']=="believer") {
 			?><th>...</th><?php
 		} ?>
 	</tr>
 	<?php 
 	if (!mysqli_num_rows($query)) {
 		?><tr><td colspan="100%"><center>There are no contributions currently</center></td></tr><?php
 	}
 	$sn=1;
 	while ($result=mysqli_fetch_array($query)) {
 		$contribution=$result['id'];
 		$query2=run("select * from payment where believer='$id' and contribution='$contribution'");
 		?>
 			<tr>
 				<td><a href="payment.php?contribution=<?php echo $result['id'] ?>"><?php echo $sn++ ?></a></td>
 
 				<td><a href="payment.php?contribution=<?php echo $result['id'] ?>"><?php echo $result['description'] ?></a></td>
 		
 				<td><a href="payment.php?contribution=<?php echo $result['id'] ?>"><?php echo $result['deadline'] ?></a></td>
                <?php $c=$result['id'] ?>
                <?php if ($_SESSION['status']=="believer") {
                    ?><th><a href="pay.php?b=<?php echo $id ?>&c=<?php echo $c ?>">Pay</a></th><?php
                } ?>
                


 			</tr>

 		<?php
 	}
 	 ?>
 </table>

 <br><br>
 <b>Note:</b> Older contributons are not displayed
<br>

<?php if ($_SESSION['status']=='ambassador'): ?>
	<a href="addcontribution.php">Add contribution</a>	
<?php endif ?>
 

 <script type="text/javascript" src="table.js"></script>