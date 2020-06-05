<?
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
        exit();
}
?>
<?php
if (isset($_POST['submit']) || isset($_GET['error'])); {
    if (isset($_POST['submit']))
        $id = $_POST['id'];
    if (isset($_GET['error'])) {
        $idArray = json_decode(base64_decode(urldecode($_GET["error"])));
        $id = $idArray[0];
        $error = $idArray[1];
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Panel </title>
        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                nicEditors.allTextAreas()
            });
        </script>
        <style>
            .container {
                margin-left: 20%;
                margin-top: 10%;
                box-shadow: 3px 3px 5px 6px #ccc;
                width: 60%;

            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2 style="text-align: center; ">Edit BLOG </h2>
            <div style="margin-left: 20%; color:red; ">
                <?php
                if (isset($error))
                    echo $error;
                ?>
            </div>
            <?php
            include_once('database/queries.php');
            $qry = new Querry();
            $result = $qry->getblog($id);
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form style="margin-left: 1%; " action="editblog.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <img style="width:300px;height:200px;" src='img/<?php echo $row['imagename']; ?>'>
                        </div>
                        <br>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                        <input type="hidden" name="imagename" value="<?php echo $row['imagename']; ?>" />
                        CHANGE IMAGE:
                        <input type="file" name="blogimage" id="blogimage">
                        <br />
                        <br />
                        TITLE:
                        <br>
                        <input type="text" name="title" style="width: 90%;" value="<?php echo $row['title']; ?>" placeholder="TITLE">
                        <br />
                        <br />
                        CONTENT:
                        <textarea name="content" style="width: 90%; height: 100px;"><?php echo $row['content']; ?></textarea>
                        <br />
                        <br />
                        <button style="margin-bottom: 1%;" name="submit" type="submit">UPDATE</button>
                    </form>
            <?php }
            } ?>
        </div>
        </boby>

    </html>
<?php
} ?>