<?php
if(isset($_POST['submit'])){
    $imagename = pathinfo(basename($_FILES["blogimage"]["name"]),PATHINFO_FILENAME);
    $imageext = strtolower(pathinfo(basename($_FILES["blogimage"]["name"]),PATHINFO_EXTENSION));
    if ($imageext !=='jpg' && $imageext !=='png' && $imageext !=='jpeg' && $imageext !=='gif' ){
        header('Location:newblog.php?error=File is not supported');
        exit();
    }
    else{
        $time=time();
        $title = $_POST['title'];
        $content  = $_POST['content'];
        $image = $imagename.$t.".".$imageext;
        $path = 'img/'.$image;
        if(move_uploaded_file($_FILES["blogimage"]["tmp_name"],$path)){
            include_once('database/queries.php');
            $qry = new Querry();
            $result = $qry->newblog($title,$image,date("d-M-Y",$time),$content);
            if ($result)
            {
                header('Location:newblog.php?success=New Blog is Posted');
                exit();  
            }
            else{
                unlink($path);
                header('Location:newblog.php?error=There was an error uploading file');
                exit();  
            }

        }
        else{
            $error ="There was an error uploading file";
            header('Location:newblog.php?error='.$error.'');
        exit();
        }
        
    }
    
}
?>