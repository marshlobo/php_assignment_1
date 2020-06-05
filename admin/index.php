<?
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
        exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel </title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
        }

        .newblog {
            width: 400px;
            margin-right: 10%;
            box-shadow: 3px 3px 5px 6px #ccc;
            text-align: center;

        }

        .head {
            margin-left: 5%;

        }

        .wrapper {
            display: grid;
            grid-template-rows: 2fr auto;
            box-shadow: 3px 3px 5px 6px #ccc;
            height: auto;
            width: 80%;
            margin-left: 10%;
            background-color: lightsteelblue;
        }

        .upperwrap {
            margin-top: 1%;
            margin-left: 1%;
            display: grid;
            grid-template-columns: 2fr 10fr;
        }

        .belowwrap {
            margin-bottom: 1%;
            margin-left: 1%;

        }

        .upperbelowwrap {
            display: grid;
            grid-template-rows: auto 5fr;

        }

        .innerbelowwrap {
            display: flex;
            flex-direction: row-reverse;


        }

        .inner {
            margin-right: 5%;
        }

        .outer {
            margin-right: 3%;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="head">
            <h2>Admin Panel</h2>
            <div style="margin-left: 3%; color:red; "><b>
                    <?php
                    if (isset($_GET['success']))
                        echo $_GET['success'];
                    ?>
                </b></div>
        </div>
        <div class="newblog">
            <a href="newblog.php">
                <button style="margin-top: 2%; height:50px;background-color:olive;color:papayawhip;">
                    POST NEW BLOG
                </button>
            </a>
        </div>
    </div>
    <br>
    <br>
    <?php
    include_once('database/queries.php');
    $qry = new Querry();
    $result = $qry->showblogs();
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <div class="wrapper" id="<?php echo $row['id']; ?>">
                <div class="upperwrap">
                    <div>

                        <img style="width:300px;height:200px;" src='img/<?php echo $row['imagename']; ?>'>
                    </div>
                    <div class="upperbelowwrap">
                        <div style="margin-left:30%; margin-top:3%;">
                            <h2><?php echo $row['title']; ?></h2>
                        </div>
                        <div style="margin-left:35%; ">
                            <p><?php echo $row['blog_date']; ?></p>
                        </div>
                    </div>

                </div>
                <div class="belowwrap">
                    <p><?php echo $row['content']; ?></p>
                    <div class="innerbelowwrap">
                        <div class="outer">
                            <form action="blogdelete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <input type="hidden" name="imagename" value="<?php echo $row['imagename']; ?>" />
                                <button name="submit" style="margin-top: 2%; width:100px; height:50px;background-color:red; color:papayawhip;">
                                    Delete
                                </button>
                            </form>
                        </div>

                        <div class="inner">
                            <form action="blogedit.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <button name="submit" style="margin-top: 2%; width:100px; height:50px;background-color:blue; color:papayawhip;">
                                    Edit
                                </button>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
            <br>
            <br>
    <?php }
    } ?>

    </boby>

</html>