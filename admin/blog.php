<?php
if(isset($_POST['submit'])){
    $imagename = pathinfo(basename($_FILES["blogimage"]["name"]),PATHINFO_FILENAME);
    $imageext = strtolower(pathinfo(basename($_FILES["blogimage"]["name"]),PATHINFO_EXTENSION));
    if ($imageext !=='jpg' && $imageext !=='png' && $imageext !=='jpeg' && $imageext !=='gif' ){
        $error = "File is not supported";
        header('Location:newblog.php?error='.$error.'');
        exit();
    }
    else{
        $t=time();
        $title = $_POST['title'];
        $content  = $_POST['content'];
        $image = $imagename.$t.".".$imageext;
        $path = 'img/'.$image;
        if(move_uploaded_file($_FILES["blogimage"]["tmp_name"],$path)){
            //

        }
        else{
            $error ="There was an error uploading file";
            header('Location:newblog.php?error='.$error.'');
        exit();
        }
        
    }
    
}
?>