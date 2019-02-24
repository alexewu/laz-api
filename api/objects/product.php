<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "Students";
 
    // object properties
    public $sid;
    public $First_name;
    public $Last_nake;
    public $Password;
    public $Added;
    public $Removed;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        $query = "SELECT * FROM Students";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($query);
    }
}