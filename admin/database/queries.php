<?php 
include_once('database.php');


class Querry{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    // For uploading new blog
    public function newblog($title,$imagepath,$date,$content){
        $sql = "INSERT INTO blogs (title,imagename,blog_date,content)
        VALUES ('$title','$imagepath','$date','$content')";
        $result = $this->db->insert($sql);
        return $result;

    }

    //For display of blogs
    public function showblogs(){
        $sql = "SELECT * FROM blogs ORDER BY id desc";
        $result = $this->db->select($sql);
        return $result;
    }

    public function deleteblogs($id){
        $sql = "DELETE FROM blogs WHERE id = '$id' ";
        $result = $this->db->delete($sql);
        return $result;
    }
}