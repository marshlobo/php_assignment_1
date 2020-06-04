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
        $sql = "INSERT INTO blog (title,imagename,blog_date,content)
        VALUES ('$title','$imagepath','$date','$content')";
        $result = $this->db->insert($sql);
        return $result;

    }

    //For display of blogs
    public function showblogs(){
        $sql = "SELECT * FROM blogs";
        $result = $this->db->select($sql);
        return $result;
    }
}