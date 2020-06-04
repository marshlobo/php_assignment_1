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
}