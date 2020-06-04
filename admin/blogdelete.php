<?php
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->deleteblogs($id);
    header('Location:/');
    exit();

}