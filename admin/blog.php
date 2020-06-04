<?php
function dataupload($title, $image, $date, $content)
{
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->newblog($title, $image, $date, $time, $content);
    if ($result) {
        header('Location:index.php?success=New Blog is Posted');
        exit();
    } else {
        unlink($path);
        header('Location:newblog.php?error=There was an error uploading file');
        exit();
    }
}
function compressimage($source, $path, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    if ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    if ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    return imagejpeg($image, $path, $quality);
}

if (isset($_POST['submit'])) {
    $imagename = pathinfo(basename($_FILES["blogimage"]["name"]), PATHINFO_FILENAME);
    $imageext = strtolower(pathinfo(basename($_FILES["blogimage"]["name"]), PATHINFO_EXTENSION));
    if ($imageext !== 'jpg' && $imageext !== 'png' && $imageext !== 'jpeg' && $imageext !== 'gif') {
        header('Location:newblog.php?error=File is not supported');
        exit();
    } else {
        $time = time();
        $title = $_POST['title'];
        $content  = $_POST['content'];
        // concat with date time to resolve overwrite isssues 
        $image = $imagename . $time . "." . $imageext;
        $path = 'img/' . $image;
        if ($_FILES["blogimage"]["size"] > 500000) {
            // if the size of image is more than 500kb compressing it
            if (compressimage($_FILES["blogimage"]["tmp_name"], $path, 50)) {
                //uploading the data to data base
                dataupload($title, $image, date("d-M-Y", $time), $content);
            }
        } else if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $path)) {
            dataupload($title, $image, date("d-M-Y", $time), $content);
        } else {
            $error = 'There was an error uploading file' . $path . '';
            header('Location:newblog.php?error=' . $error . '');
            exit();
        }
    }
}
