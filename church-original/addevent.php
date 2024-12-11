<title>CSS - Add event</title>

<?php include 'church_header.php'; ?>

<?php 
	if (isset($_SESSION['status']) && $_SESSION['status']=='ambassador') {
	}else{
		die("<center style='color:red'>Access denied</center>");
	}


 ?>

<h2>Add an event for your church</h2>

<?php 
	if (isset($_POST['submit'])) {
		
		$date = (isset($_POST['date'])) ? $_POST['date'] : "" ;
		if (isset($_POST['date'])) {
			$weekday=date('w',strtotime($date));
		}else $weekday=NULL;

		$time=$_POST['time'];
		$event=$_POST['event'];
		$church=$_SESSION['church'];
		$repeat=(isset($_POST['repeat'])) ? $_POST['repeat'] : "" ; 


		$query=run("insert into schedule values('','$time','$event','$church','$date','$repeat','$weekday')");
		echo "<center style='color:green'>One event is added successfully</center>";


	}

 ?>






<form method="post">
	<input type="checkbox" id="repeat" onclick="showrepeat()" class="inputexception"><label for="repeat">Repeat</label><br>
	&emsp;&emsp;<span id="daily"><input class="inputexception" type="radio" name="repeat" id="radiodaily" value="daily" onclick="showrepeat()" ><label for="radiodaily">Daily</label></span><br>
	&emsp;&emsp;<span id="monthly"><input class="inputexception" type="radio" name="repeat" id="radiomonthly" value="weekly" onclick="showrepeat()" ><label for="radiomonthly">Weekly</label></span><br>
	<input type="date" name="date" id="date" required title="Date of the event"><br><br>
	<input type="time" name="time" required title="Time of starting the event"><br><br>
	<input type="text" name="event" placeholder="Name of the event" required title="Name of the event"><br>

	<input type="submit" name="submit" class="submit">
</form>



<script type="text/javascript">
	
	var daily=document.getElementById('daily');
	var monthly=document.getElementById('monthly');
	daily.style.display='none';
	monthly.style.display='none';
	function showrepeat(){
		var repeat=document.getElementById('repeat');
		if (repeat.checked) {
			var daily=document.getElementById('daily');
			var monthly=document.getElementById('monthly');
			daily.style.display='inline';
			monthly.style.display='inline';

			var radiodaily=document.getElementById('radiodaily');
			var radiomonthly=document.getElementById('radiomonthly');

			radiodaily.required=true;
			radiomonthly.required=true;

			var date=document.getElementById('date');
			if (radiodaily.checked) {
				date.style.display='none';
				date.required=false;

			}
			if (radiomonthly.checked) {
				date.style.display='inline';
				date.title='Choose starting date for the event';
				date.required=true;
			}

		}else{
			var radiodaily=document.getElementById('radiodaily');
			var radiomonthly=document.getElementById('radiomonthly');
			var daily=document.getElementById('daily');
			var monthly=document.getElementById('monthly');
			var date=document.getElementById('date');
			daily.style.display='none';
			monthly.style.display='none';
			date.style.display='inline';
			radiodaily.required=false;
			radiomonthly.required=false;
			radiodaily.checked=false;
			radiomonthly.checked=false;
			date.required=true;

		}
	}
</script>