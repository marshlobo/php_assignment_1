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
    .container{
      margin-left: 20%;
      margin-top: 10%;
      box-shadow: 3px 3px 5px 6px #ccc;
      width:60%;
      
    }
  </style>
</head>

<body>
  <div class="container">
    <h2 style="text-align: center; ">POST NEW BLOG</h2>
    <form  style="margin-left: 1%; " action="blog.php" method="POST">
      <div>
        <input style="margin-top: 1%;"type="file" name="blogimage" required>
        <br />
        <br />
        <input type="text" name="title" style="width: 90%;" placeholder="TITLE">
        <br />
        <br />
        CONTENT:
        <textarea name="content" style="width: 90%; height: 100px;" ></textarea>
        <br />
        <br />
        <button  style="margin-bottom: 1%;" name="submit" type="submit">POST</button>
    </form>
  </div>
  </boby>

</html>