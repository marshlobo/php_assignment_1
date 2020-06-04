<?php
function dataupload($id, $title, $image, $content, $delimage)
{
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->updateblog($id, $title, $image, $content);
    if ($result) {
        unlink('img/' . $delimage);
        header('Location:index.php#' . $id);
        exit();
    } else {
        unlink('img/'.$image);
        $idArray = [$id, 'There was an error uploading file'];
        $urlArray = urlencode(base64_encode(json_encode($idArray)));
        header('Location:blogedit.php?error=' . $urlArray);
        exit();
        exit();
    }
}
function contentupload($id, $title, $content)
{
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->updateblogcontent($id, $title, $content);
    if ($result) {
        header('Location:index.php#' . $id);
        exit();
    } else {
        
        $idArray = [$id, 'There was an error uploading file'];
        $urlArray = urlencode(base64_encode(json_encode($idArray)));
        header('Location:blogedit.php?error=' . $urlArray);
        exit();
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
    $id = $_POST['id'];
    if (is_uploaded_file($_FILES["blogimage"]['tmp_name'])) {
        $imagename = pathinfo(basename($_FILES["blogimage"]["name"]), PATHINFO_FILENAME);
        $imageext = strtolower(pathinfo(basename($_FILES["blogimage"]["name"]), PATHINFO_EXTENSION));
        if ($imageext !== 'jpg' && $imageext !== 'png' && $imageext !== 'jpeg' && $imageext !== 'gif') {
            $idArray = [$id, 'File is not supported'];
            $urlArray = urlencode(base64_encode(json_encode($idArray)));
            header('Location:blogedit.php?error=' . $urlArray);
            exit();
        } else {
            $time = time();
            $title = $_POST['title'];
            $content  = $_POST['content'];
            $delimage = $_POST['imagename'];

            // concat with date time to resolve overwrite isssues 
            $image = $imagename . $time . "." . $imageext;
            $path = 'img/' . $image;
            if ($_FILES["blogimage"]["size"] > 500000) {
                // if the size of image is more than 500kb compressing it
                if (compressimage($_FILES["blogimage"]["tmp_name"], $path, 50)) {
                    //uploading the data to data base
                    dataupload($id, $title, $image, $content, $delimage);
                }
            } else if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $path)) {
                dataupload($id, $title, $image, $content, $delimage);
            } else {
                $idArray = [$id, 'There was an error uploading file'];
                $urlArray = urlencode(base64_encode(json_encode($idArray)));
                header('Location:blogedit.php?error=' . $urlArray);
                exit();
            }
        }
    } else {
        $title = $_POST['title'];
        $content  = $_POST['content'];
        // update content with out image
        contentupload($id, $title,$content);

    }
}
