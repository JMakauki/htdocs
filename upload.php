

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

