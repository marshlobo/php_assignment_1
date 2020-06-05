<?php
include_once('database.php');


class Querry
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    // For uploading new blog
    public function newblog($title, $imagepath, $date, $content)
    {
        $sql = "INSERT INTO blogs (title,imagename,blog_date,content)
        VALUES ('$title','$imagepath','$date','$content')";
        $result = $this->db->insert($sql);
        return $result;
    }

    //For display of blogs
    public function showblogs()
    {
        $sql = "SELECT * FROM blogs ORDER BY id desc";
        $result = $this->db->select($sql);
        return $result;
    }

    //for deleting blog
    public function deleteblogs($id)
    {
        $sql = "DELETE FROM blogs WHERE id = '$id' ";
        $result = $this->db->delete($sql);
        return $result;
    }
    // get the blog by id
    public function getblog($id)
    {
        $sql = "SELECT * FROM blogs WHERE id = '$id' ";
        $result = $this->db->select($sql);
        return $result;
    }
    // update blog with image
    public function updateblog($id, $title, $image, $content)
    {
        $sql = "UPDATE blogs SET title = '$title', imagename = '$image', content = '$content' WHERE id = '$id' ";
        $result = $this->db->update($sql);
        return $result;
    }
    // update blog with title and content
    public function updateblogcontent($id, $title, $content)
    {
        $sql = "UPDATE blogs SET title = '$title', content = '$content' WHERE id = '$id' ";
        $result = $this->db->update($sql);
        return $result;
    }
    // for login validation
    public function checklogin($user, $pass)
    {
        $sql = "SELECT * FROM adminlogin WHERE user = '$user' and passcode = '$pass'";
        $result = $this->db->select($sql);
        if (mysqli_num_rows($result))
            return true;
        else
            return false;
    }
}
