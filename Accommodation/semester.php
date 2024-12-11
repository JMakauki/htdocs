<title>SAMS | Semester information</title>

<?php 	

include 'header.php';



 ?>
<center>
   <br>
 <div class="table">
    Start of current semester: <span class="inline"><?php echo $semester1 ?></span><br><br>
    
    <?php if ($_SESSION['status']!='Student'): ?>
         <a class="btn" href="editsemester.php">Change</a>
    <?php endif ?> 
 </div>
</center>