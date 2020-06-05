<!DOCTYPE html>
<html>

<head>
    <title>User Panel </title>
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
    </style>
</head>

<body>
    <div class="header">
        <div class="head">
            <h2>Welcom to Blogs</h2>
            <div style="margin-left: 3%; color:red; "><b>
                    <?php
                    if (isset($_GET['success']))
                        echo $_GET['success'];
                    ?>
                </b></div>
        </div>
        <div class="newblog">
            <a href="admin/login.php">
                <button style="margin-top: 2%; height:50px;background-color:olive;color:papayawhip;">
                    Manage Blogs
                </button>
            </a>
        </div>
    </div>
    <br>
    <br>
    <?php
    include_once('admin/database/queries.php');
    $qry = new Querry();
    $result = $qry->showblogs();
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <div class="wrapper">
                <div class="upperwrap">
                    <div>

                        <img style="width:300px;height:200px;" src='admin/img/<?php echo $row['imagename']; ?>'>
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
                </div>


            </div>
            <br>
            <br>
    <?php }
    } ?>

    </boby>

</html>