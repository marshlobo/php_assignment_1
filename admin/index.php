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
        .wrapper{
            display: grid;
            grid-template-rows: 2fr auto;
            box-shadow: 3px 3px 5px 6px #ccc;
            height: auto;
            width: 80%;
            margin-left: 10%;
            background-color: lightsteelblue;
        }
        .upperwrap{
            margin-top: 1%;
            margin-left: 1%;
            display: grid;
            grid-template-columns: 2fr 10fr;
        }
        .belowwrap{
            margin-bottom: 1%;
            margin-left: 1%;
        }
        .upperbelowwrap{
            display: grid;
            grid-template-rows:auto 1fr ;

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
            <button style="margin-top: 5%;"><a href="newblog.php">POST NEW BLOG</a></button>
        </div>
    </div>
    <br>
    <br>
    <div class="wrapper">
        <div class="upperwrap">
            <div >
                
                <img  style="width:300px;height:200px;" src="img/Screenshot from 2020-02-14 09-46-021591276038.png">
            </div>
            <div class="upperbelowwrap">
                <div>hello</div>
                <div>world</div>
            </div>
            
        </div>
        <div class="belowwrap">uygceugyuyeguyweguy</div>


    </div>

    </boby>

</html>