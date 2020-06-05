<html>

<head>
    <title>Admin Panel</title>
    <style>
        .container {
            margin-left: 20%;
            margin-top: 10%;
            box-shadow: 3px 3px 5px 6px #ccc;
            width: 40%;
            background-color: lightyellow;
        }

        .formbox {
            margin-left: 2%;
            margin-bottom: 2%;



        }
    </style>
</head>

<body>
    <div class="container">
        <form class="formbox" action="checklogin.php" method="POST">
            <h1 style="margin-top: 2%;">LOGIN</h1>
            <label>USER NAME:<label>
                    <br>
                    <input style="width:50%;height:3%;" type="text" name="user" required/>
                    <br>
                    <br>
                    <label>PASSWORD:</label>
                    <br>
                    <input style="width:50%;height:3%;" type="password" name="pass" required/>
                    <br>
                    <br>
                    <button style="margin-bottom: 2%;width:10%;height:4%;background-color:#2196F3;" name="submit">LOGIN</button>
        </form>
    </div>
</body>

</html>