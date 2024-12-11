<title>Payment</title>

<?php include 'church_header.php'; ?>

<?php if ($_SESSION['status']!='ambassador') {
	die("Access denied");
} ?>

<?php 

if (isset($_GET['contribution'])) {
	$contribution=$_GET['contribution'];
	$query=run("select * from payment join user on payment.believer=user.id where contribution='$contribution'");

	$query1=run("select * from contribution where id='$contribution'");
	$result1=mysqli_fetch_array($query1);




}


 ?>

<div id="print">
 <table border="1" rules="all" width="600px">

 	<caption><h3><?php echo $result1['description'].' (Deadline: '.$result1['deadline'].')'; ?></h3></caption>

 	
 	<tr>
 		<th>S/N</th>
 		<th>Name</th>
 		<th>Amount</th>
 	</tr>
 	<?php 
 	if (!mysqli_num_rows($query)) {
 		?><tr><td colspan="100%"><center>There are no payments</center></td></tr><?php
 	}
 	$sn=1;
 	while ($result=mysqli_fetch_array($query)) {
 		$contribution=$result['id'];
 		
 		?>
 			<tr>
 				<td><?php echo $sn++ ?></td>
 
 				<td><?php echo $result['fname'].' '.$result['lname'] ?></td>
 		
 				<td><?php echo $result['amount'] ?></td>

 			
 			</tr>
 		<?php
 	}
 	 ?>
 </table>
</div>
<br>

<br>
<center><button onclick="printtag('print')" >Print</button></center>


<script type="text/javascript">
 		
 	function printtag(id){
 		printcontent=document.getElementById(id).innerHTML;
 		originalcontent=document.body.innerHTML;

 		document.body.innerHTML=printcontent;

 		window.print();

 		document.body.innerHTML=originalcontent;
 	}

 </script>
