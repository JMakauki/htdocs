<img src="//localhost:8080/fontawesome/svgs/brands/edge.svg" width="30" style="">
<br>
<a href="//localhost:8080/fontawesome/svgs/solid/football.svg">svg football</a>
<br>

<a href="//www.fxblue.com/users/2722083" target="_blank">Fx Blue</a><br>
<iframe src="//www.fxblue.com/fxblueview.aspx?id=2722083" width="700" height="800px" >

</iframe>

<br><br><br>


<div id="economicCalendarWidget"></div>
<script async type="text/javascript" data-type="calendar-widget" src="https://www.tradays.com/c/js/widgets/calendar/widget.js?v=12">
  {"width":"100%","height":"100%","type":"calendar","theme":1,"mode":2,"lang":"en"}
</script>


<a href="ms-settings:">Open Windows Settings</a>

<br><br><br>

<div class="relalg">
	<h2 style="display:inline;">(</h2>
<tt></tt>π<sub> <var>fname</var>, <var>lname</var> </sub>
<tt>&nbsp;</tt>σ<sub> <var>level</var> = "Manager" </sub> <var></var>(employee ⋈ <var>works</var>_on)
	<h2 style="display:inline;">)</h2>
	 &ndash;
	<h2 style="display:inline;">(</h2>
<tt>&nbsp;</tt>π<sub> <var>fname</var>, <var>lname</var> </sub> <var></var>(employee ⋈ <var>dependents</var>)
<h2 style="display:inline;">)</h2>
</div>
<br><br><br>

<div class="relalg">
<tt></tt>π<sub> <var>pno</var> </sub>
<tt>&nbsp;</tt>σ<sub> <var>lname</var> = "Morice" </sub> <var></var>(employee ⋈ <var>works</var>_on ⋈ <var>project</var>)<br><br>
</div>


<?php 
if (isset($_GET['mult'])) {
	echo $_GET['mult'][0];
	echo $_GET['mult'][1];
	echo $_GET['mult'][2];
}
 ?>
<form>
<select name="mult[]" multiple required>
	<option value="one">one</option>
	<option  value="two">two</option>
	<option value="three">three</option>
</select>
<input type="submit" name="">
</form>


<link rel="icon" type="text/css" href="ea.png">
<img src="ea.png">


<link rel="stylesheet" type="text/css" href="">


<link rel="stylesheet" type="text/css" href="styles.css">





<a href="more_info.html"><img href="donalt.png"></a>






<style type="text/css">

	h1{
		color: ;
	}

</style>



<img href=".png" alt="my picture">



<ol type="a">
	<li>hello</li>
	<li>hey</li>
</ol>

<table border="1">
	<th>hey</th>
</table>

<?php 
session_start();	
	if (isset($_GET['submit'])) {
		# code...
	

	$connection=mysqli_connect('localhost','root','','test');
	$username=$_GET['username'];
	$password=$_GET['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$sql="select * from user where username='$username' and password='$password'";
	$query=mysqli_query($connection,$sql);
	$result=mysqli_fetch_array($query);
	if(mysqli_num_rows($query)!=0){
		$_SESSION['name']=$result['id'];
		echo $_SESSION['name'];
	}


	
	
	
	


}



 ?>

<style type="text/css">
	body{
		background-color: white;
	}
	input{
		text-align: center;
	}
	fieldset{
		border:1px solid lightblue;
		height:50px;
		width: 350px;
	}
	legend{
		display: none;

	}
	input:focus{
		outline: none;
		background-color: #0003;
	}
	input:focus ~ legend{
		display: block;
	}
	
	input{
		border:none;
	}
</style>

 	<form action="test.php" method="GET">
		
 		<fieldset style="padding:0px" >
 			
			<input type="text" name="username" placeholder="username" required value="<?php if (isset($username)) echo $username; ?>" style="width: 100%; height:100%;border:none;" ><br>
			<legend>username</legend>
		</fieldset>

		<fieldset style="padding:0px" >
			<input type="password" name="password" placeholder="password" required style="width: 100%; height:100%;border:none;"><br>
			<legend>Password</legend>
		</fieldset>
		
		<center><input  type="submit" name="submit" value="register"></center>
	</form>

<!-- 

 <embed src="INDIVIDUAL ASSIGNMENT-1.pdf" width="800px" height="1200"></embed>
 -->
<!-- <iframe src="CSS_223_ASSIGNMENT_2XX.pdf" height="2000px" width="900px"></iframe> -->
 
		
		<!-- <link rel="stylesheet" type="text/css" href="materialize.min.css"> -->


<?php echo md5("admin") ?>

<!-- <iframe src="IMG_1134.JPG"></iframe> -->
<!-- <embed src="IMG_1134.JPG"></embed> -->
<embed src="..\NIDA\nida er model.pdf" width="900px" height="600px"></embed>
<embed src="..\NIDA" width="900px" height="600px"></embed>


<frameset rows="70%,30%"><br>
	<iframe src="project.php" width="1000" height="700"></iframe>
	<frame src="IMG_1134.JPG"></frame>
	<frame src="transfer/home.php"></frame>
	<noframes>
		<body>browser does not support frames</body>
	</noframes>
</frameset>

<br><br>
<?php 


if(2>1):
	echo "The condition is true";
else:
	echo "The condition is false";
endif;

 ?>


 H<sub>2</sub>O

 <br>
 a<sup>2</sup>
 




<br><br><br>

<pre>
<?php 

	if(isset($_POST['upload'])){

		$file_name=random_int(1000, 9999).'-'.str_replace(' ','-', $_FILES['file']['name']);
		
		if (move_uploaded_file($_FILES['file']['tmp_name'], "web/".$file_name))
			echo "Upload successful<br>";
		else echo "UPLOAD FAILED";
		print_r($_FILES);
	}


 ?>
</pre>


 <form method="post" enctype="multipart/form-data">
 	<input type="file" name="file">
 	<input type="submit" name="upload" value="Upload">
 </form>


 <?php 
echo date('y-m-d');
  ?>



  <object width="854" height="480" data="https://www.youtube.com/v/6ttN2U5Yabg" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" /> </object>

  <object height="500" data="http://www.youtube.com/embed/Ahg6qcgoay4"></object> <br><br>

  <iframe height="400" width="770" src="http://www.youtube.com/embed/Ahg6qcgoay4" allowfullscreen frameborder="0" scrolling="auto"></iframe> <br><br>

  <div class="sqs-video-wrapper" data-provider-name="YouTube" data-html="<br/><br/><br/><br/><br/>&lt;iframe src=&quot;//www.youtube.com/embed/y89oEA2l8Bc?wmode=opaque&quot; height=&quot;480&quot; width=&quot;854&quot; scrolling=&quot;no&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;<br/>"></div>

  <br/><br/><br/><br/><br/>&lt;iframe src=&quot;//www.youtube.com/embed/y89oEA2l8Bc?wmode=opaque&quot; height=&quot;480&quot; width=&quot;854&quot; scrolling=&quot;no&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;<br/>

  <iframe src="//www.youtube.com/embed/y89oEA2l8Bc?wmode=opaque" height="480" width="850" scrolling="no" frameborder="0" allowfullscreen></iframe>

  <br><br>

<h3>PDF iframe</h3>
  	<iframe height="400" width="770" src="..\NIDA\nida er model.pdf"></iframe> <br><br>

<h3>DOC iframe</h3>
		<iframe height="400" width="770" src="C:\Users\JOHNSON\Documents\yr 3\s2\css 324 - E-Business and E-commerce\ASSIGNMENT ONE(group).doc.pdf"></iframe> <br><br>


 <br>
 <h2>Nba stream</h2>

 <iframe height="400" width="770" sr="http://xestreams.com/livetv/tv01.php" allowfullscreen frameborder="0" scrolling="auto"></iframe> <br><br>



 <br><br><br><br>

 notification <sup class="notification">3</sup>
 <style type="text/css">
 		.notification{
 			border-radius: 20px;
 			background-color: darkred;
 			color: white;
 			padding-left: 4px;
 			padding-right: 4px;
 		}
 </style>

<br><hr>

<fieldset><legend style="display: inherit;">Import csv file </legend>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file" accept=".csv" required>
		<input type="submit" name="import" value="Import">
	</form>
</fieldset>

<?php 
	if (isset($_POST['import'])) {
		$file_name=$_FILES['file']['tmp_name'];
		echo $file_name;
		$file=fopen($file_name, 'r');
		$data=fgetcsv($file);
		$data=fgetcsv($file);
		echo "<br>";
		echo $data['2'];
	}
echo sha1("123");

 ?><br>
<?php echo password_hash("123" , 1); ?>
<br>
<iframe height="400" width="770" src="D:/KOMU/Impact/index.html#"></iframe>


<br><br>
