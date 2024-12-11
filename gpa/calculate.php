<?php 	

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

echo $gpa;

 ?>