<?php
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $image = $_POST['imagename'];
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->deleteblogs($id);
    unlink('img/'.$image.'');
    header('Location:index.php');
    exit();

}