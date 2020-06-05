<?php
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->checklogin($user, $pass);
    if ($result) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location:index.php');
        exit();
    } else {
        header('Location:login.php');
        exit();
    }
}
