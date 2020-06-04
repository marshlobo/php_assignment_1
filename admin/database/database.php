<?php
include_once('config.php');

class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;


    public function __construct(){
        $this->connectDB();
    }

    //DB connection

    private function connectDB(){
        $this-> link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!this->link)
        {
            $this->error = "connection failed to DB".$this ->link ->connect_error;
            return false;
        }
    }


    //Crud Opertations

    //Insert Data
    public function insert($sql){
        $result = $this->link->query($sql) or die (this->link->error.__LINE__);
        return $result;
    }

    //Read Data
    public function select($sql){
        $result  = $this->link->$this->link->query($sql) or die (this->link->error.__LINE__);
        if ($result->num_rows)
            return $result;
        else
            return false;
    }

    //update the data
    public function update($sql){
        $result = $this->link->query($sql) or die (this->link->error.__LINE__);
        return $result;
    }

    //delete data
    public function delete($sql){
        $result = $this->link->query($sql) or die (this->link->error.__LINE__);
        return $result;
    }

}