<?php 
class DataBase{
    
     Public $servername = "localhost";
    Public $username = "root";
    Public $password = "";
    Public $dbname = "aidprofen_org";
    public $db;

    Public function db_con(){
        try{
            $this->db = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname."","".$this->username."", "".$this->password."");
            $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
               } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }   
        return $this->db ;
    } 
} 
?>