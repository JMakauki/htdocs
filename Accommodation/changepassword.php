<?php include 'header.php'; ?>

<title>SAMS | Change password</title>


<center><h2>CHANGE PASSWORD</h2></center>
 <hr>


<?php 

if (isset($_POST['submit'])) {
    
    $id=$_SESSION['id'];
    $oldpassword=mysqli_real_escape_string($connect,$_POST['oldpassword']);
    $newpassword=mysqli_real_escape_string($connect,$_POST['newpassword']);
    $confirm=mysqli_real_escape_string($connect,$_POST['confirm']);

    if ($_SESSION['status']=='Student') {
        $query=run("select * from student where regno='$id' and password='$oldpassword' limit 1");
    }else if ($_SESSION['status']=='Staff') {
        $query=run("select * from staff where staff_id='$id' and password='$oldpassword' limit 1");
    }else if ($_SESSION['status']=='Admin') {
        $query=run("select * from admin where username='$id' and password='$oldpassword' limit 1");
    }
    $result=mysqli_fetch_array($query);

    
    if ($oldpassword != $result['password']) {
        ?><i style="color: red;">Old password is wrong</i><?php
    }else if ($confirm != $newpassword) {
        ?><i style="color: red;">New passwords do not match</i><?php
    }
    else{
        if ($_SESSION['status']=='Student') {
            $query=run("update student set password='$newpassword' where regno='$id'");
        }else if ($_SESSION['status']=='Staff') {
            $query=run("update staff set password='$newpassword' where staff_id='$id'");
        }else if ($_SESSION['status']=='Admin') {
            $query=run("update admin set password='$newpassword' where username='$id'");
        }

        if ($query){
            ?><h4 style="color: green;">Password is successfully changed</h4><?php
            die();
        }
        
    }


    
}


 ?>


 <form method="POST" >
 		<input type="text" name="oldpassword" placeholder="Old password" required><br><br>	
 		<input type="text" name="newpassword" placeholder="New password" required><br><br>
 		<input type="text" name="confirm" placeholder="Confirm new password" required><br><br>
 		<input type="submit" name="submit" class="btn">
 
 </form>