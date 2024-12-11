
<?php 
if (isset($_GET['pair1'])) {
		$pair1=$_GET['pair1'];
		$pair2=$_GET['pair2'];
		$pair3=$_GET['pair3'];
		$price1=$_GET['price1'];
		$price2=$_GET['price2'];
		$price3=$_GET['price3'];
		$arb=($price1/$price2)/$price3;
}
 ?>
<h2><a href="./">Home</a></h2>
 <form>
 	<input type="text" name="pair1" placeholder="pair1" value="<?php echo isset($pair1)?$pair1:'' ?>"> 
 		<input type="text" name="price1" placeholder="price1" value="<?php echo isset($price1)?$price1:'' ?>"><br>
 	<input type="text" name="pair2" placeholder="pair2" value="<?php echo isset($pair2)?$pair2:'' ?>"> 
 		<input type="text" name="price2" placeholder="price2" value="<?php echo isset($price2)?$price2:'' ?>"><br>
 	<input type="text" name="pair3" placeholder="pair3" value="<?php echo isset($pair3)?$pair3:'' ?>"> 
 		<input type="text" name="price3" placeholder="price3" value="<?php echo isset($price3)?$price3:'' ?>"><br>
 	<input type="submit" name="Calculate" value="Calculate">
 </form>



<?php 
	if (isset($_GET['pair1'])) {
		
		echo "($pair1/$pair2)/$pair3=".$arb;


	}else
		echo "(price1/price2)/price3";



 ?>
