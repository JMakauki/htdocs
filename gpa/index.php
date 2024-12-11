
<style type="text/css">
	fieldset{
		background-color: #aac;
		box-shadow: 0px 0px 3px black;
		border-radius: 6px;
		transition: 0.2s;
		border:none;
		display: inline;
		width: 40%;
		box-sizing: ;
		padding: 20px;
		margin: 5px;

	}

	fieldset:hover{
		background-color: #aad;
		box-shadow: 0px 0px 6px black;
		border-radius: 6px;
		transition: 0.2s;
	}

	legend{
		background-color: #aac;
		
		border-radius: 20%;
	}
	.main{
		background-color: #ddd;
		width: 900px;
		margin:auto;
		padding:40px;
		box-shadow: 0px 0px 3px black;
		transition: 0.2s;
		border:none;


	}
	body{
		margin:0;
		font-family: tahoma;
	}

	.header{
		padding:50px;
		background-color: #aac;

	}
	.hidden{
		display: none;
	}

	footer{
		color:#555;
	}


	input,select{
		border: solid 2px lightgray;
		outline: none;
		border-radius: 5px;
		padding: 5px;
		/*transition: 0.2s;*/
	}
	input:focus,select:focus{
		border: solid 2px #00f5;
		outline: solid 2px #00f3;
	}
	.btn{
		border: solid 1px #44f;
		outline: none;
		border-radius: 4px;
		padding: 5px;
		font-size: 15px;
		transition: 0.2s;
		cursor: pointer;
		color: #44f;
		background-color: white;
		outline: solid 2px #0000;
	}
	.btn:hover{
		background-color: #66c;
		color: white;
	}
	.btn:focus{
		border: solid 1px #00f5;
		/*outline: solid 2px #00f3;*/
	}
	
	.rounded{
		border-radius: 500px;
	}
</style>

<?php 	
if (isset($_POST['subjects']) || isset($_POST['calculate'])) {
 		if (isset($_POST['add'])) {
 			$_POST['subjects']++;
 		}
 		$subjects=$_POST['subjects'];
 		
 }
 ?>




<div class="header">
	<a href="."><center><h1>GPA CALCULATOR</h1></center></a>
</div>









<div class="main">
<form method="post" action=".">
 	<input type="" name="subjects" placeholder="Number of courses" value="<?php if(isset($subjects)) echo $subjects ?>" required>
 	<input type="submit" name="submit" class="btn rounded">
</form>

<form method="post" action="#gpa">	
 	

 	<?php 

 	if (isset($_POST['subjects']) || isset($_POST['calculate'])) {
 		
 		
 		$s=1;
 		echo "<br><br><br>";
 		while ($s<=$subjects) {
 			if (isset($_POST["score$s"])) {
 				$sc=$_POST["score$s"];
 			}else $sc="";
 			if (isset($_POST["credits$s"])) {
 				$cr=$_POST["credits$s"];
 			}else $cr="";
 			?>
 			<fieldset>
 				<legend>Course <?php echo $s ?></legend>
 				<input type="number" placeholder="Credits (units)" name="credits<?php echo $s ?>" required value="<?php if(isset($cr)) echo $cr ?>"> 
 				<label>Grade:</label>
 				<select name="score<?php echo $s ?>" required>
 					<option></option>
 					<?php if (isset($sc)&&$sc=='A')echo "<option value='A' selected>A</option>"; else echo "<option value='A'>A</option>" ?>
 					<?php if (isset($sc)&&$sc=='B+')echo "<option value='B+' selected>B+</option>"; else echo "<option value='B+'>B+</option>" ?>
 					<?php if (isset($sc)&&$sc=='B')echo "<option value='B' selected>B</option>"; else echo "<option value='B'>B</option>" ?>
 					<?php if (isset($sc)&&$sc=='C')echo "<option value='C' selected>C</option>"; else echo "<option value='C'>C</option>" ?>
 					
 					
 				</select>
 				<br><br>	
 			</fieldset>
 			<?php
 			$s++;
 		}

 	?>

 	<br><br>
 	<input type="hidden" name="subjects" value="<?php echo $subjects ?>" >
 	<input type="submit" name=calculate value="Calculate" class="btn rounded">
 	<?php

 	}

 	 ?>
 	


 </form>
 <form method="post" action="#add">
<div class="hidden">
 	<?php 
 	if (isset($_POST['subjects'])) {
 		// code...
 	
 		$s=1;
 		echo "<br><br><br>";
 		while ($s<=$subjects) {
 			if (isset($_POST["score$s"])) {
 				$sc=$_POST["score$s"];
 			}else $sc="";
 			if (isset($_POST["credits$s"])) {
 				$cr=$_POST["credits$s"];
 			}else $cr="";
 			?>
 			<fieldset>
 				<legend>Course <?php echo $s ?></legend>
 				<input type="number" placeholder="Credit (units)" name="credits<?php echo $s ?>"  value="<?php if(isset($cr)) echo $cr ?>"> 
 				<label>Grade:</label>
 				<select name="score<?php echo $s ?>" >
 					<option></option>
 					<?php if (isset($sc)&&$sc=='A')echo "<option value='A' selected>A</option>"; else echo "<option value='A'>A</option>" ?>
 					<?php if (isset($sc)&&$sc=='B+')echo "<option value='B+' selected>B+</option>"; else echo "<option value='B+'>B+</option>" ?>
 					<?php if (isset($sc)&&$sc=='B')echo "<option value='B' selected>B</option>"; else echo "<option value='B'>B</option>" ?>
 					<?php if (isset($sc)&&$sc=='C')echo "<option value='C' selected>C</option>"; else echo "<option value='C'>C</option>" ?>
 					
 					
 				</select>
 				<br><br>	
 			</fieldset>
 			<?php
 			$s++;
 		}
 	}

 	 ?>
 </div>
 	<input type="hidden" name="subjects" value="<?php if(isset($subjects)) echo $subjects ?>" >
 	
 	<button name="add" id="add" class="btn rounded">+ Add course</button>
 </form>



<?php 	
if(isset($_POST['calculate'])){
$subjects=$_POST['subjects'];
$s=$subjects;
$totalcredits=0;
$totalmarks=0;
while ($s>0) {

	switch ($_POST["score$s"]) {
		case 'a':
			$score=5;
			break;

		case 'b+':
			$score=4;
			break;

		case 'b':
			$score=3;
			break;

		case 'c':
			$score=2;
			break;

		case 'A':
			$score=5;
			break;

		case 'B+':
			$score=4;
			break;

		case 'B':
			$score=3;
			break;

		case 'C':
			$score=2;
			break;
		
		default:
			die("Error: Invalid input... (Enter alphabets 'a - c' in grade fields)");
			break;
	}


	$totalcredits+=$_POST["credits$s"];
	$totalmarks+=($score*$_POST["credits$s"]);
	$s--;

}

$gpa=$totalmarks/$totalcredits;

?>
<hr>
<fieldset id="gpa">
	
	<b class="">GPA: <?php echo $gpa; ?></b>
</fieldset>

<?php

}
 ?>

 </div>

 <hr>

 <div class="main">
 	<fieldset>
 		<legend>
 			How to calculate
 		</legend>
 		<textarea cols="70" rows="15" readonly>
 		
               &sum;(grade x credit)                      
        GPA =  ____________________                       
                 &sum;(credit)                            
                                                          
 		
 		<?php 
 	if (isset($_POST['calculate'])) {
 		?> 			  
	GPA = <?php echo $totalmarks ?>/<?php echo $totalcredits ?> = <?php echo $gpa ?>
 		<?php
 	}
 		 ?>



  NB: A =5
      B+=4
      B =3
      C =2
 		</textarea>
 	</fieldset>
 </div>

 













<?php 
// #include <stdio.h>
// #include <stdlib.h>
// main(){
// 	int yrs,subjects,totalCredits;
// 	float totalMarks;
// 	float totalGPA=0;
// 	int i=0;
// 	int j=0;
// 	printf("\n\tGPA calculator");
// 	printf("\n\t--------------\n");
// 	printf("\nHow to fill in grades\nA  --> 5");
// 	printf("\nB+ --> 4\nB  --> 3\nC  --> 2\n");
// 	printf("\nHow many years of study: ");
// 	scanf("%d",&yrs);
// 	float gpa[yrs];


// 	if(yrs<1) goto END;

// 	for (i=0;i<yrs;i++){
// 		if (yrs==1){
// 			printf("\nHow many subjects : ");
// 			goto ONE;
// 		}
// 		if (i==0)printf("\nHow many subjects for 1st year: ");
// 		if (i==1)printf("\nHow many subjects for 2nd year: ");
// 		if (i==2)printf("\nHow many subjects for 3rd year: ");
// 		if (i>2)printf("\nHow many subjects for year %d : ",i+1);
// 		ONE:
// 		scanf("%d",&subjects);
// 		float sbt[subjects];
// 		int credits[subjects];
// 		totalCredits=0;
// 		totalMarks=0;
		
// 		for (j=0;j<subjects;j++){
// 			printf("\nSubject %d\nCredits(units): ",j+1);
// 			scanf("%d",&credits[j]);
// 			totalCredits+=credits[j];
// 			printf("Grade: ");
// 			scanf("%f",&sbt[j]);
// 			totalMarks+=(credits[j]*sbt[j]);
// 		}
// 		if (totalCredits==0)totalCredits=1;
		
// 		gpa[i]=totalMarks/totalCredits;
		
// 		printf("\nYear %d GPA: %f\n",i+1,gpa[i]);
// 		totalGPA+=gpa[i];
		
// 	}

// 	printf("\nFinal GPA: %f", totalGPA/yrs);
// 	END:;
	
// }
 ?>



<footer>
	<br><br>
	<center><h2>Johnson 2021<sup>&copy;</sup></h3></center>
</footer>