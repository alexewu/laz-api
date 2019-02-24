<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "laz_mdp_api";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    public function setup(){

        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute("CREATE TABLE Students(
            SID INTEGER,
            First_Name VARCHAR2(100) NOT NULL,
            Last_Name VARCHAR2(100) NOT NULL,
            Password VARCHAR2(100) NOT NULL,
            Added VARCHAR2(100) NOT NULL,
            Removed VARCHAR2(100).
            PRIMARY KEY(SID)
        )");
        
        $stmt->execute("CREATE TRIGGER add_Student
            BEFORE INSERT ON Students
            FOR EACH ROW
            BEGIN
                SELECT NOW() INTO :NEW.Added;
            END");
        
        $stmt->execute("INSERT INTO Students(SID, First_Name, Last_Name, Password) VALUES(
            (1, 'Alexander', 'Huang', 'password'),
            (2, 'Alexandra', 'Wu', 'thisMaHsecurePassWORD'),
            (3, 'Aadhar', 'Agarwal', 'bosco_sticks')
        )");
    }
}
?>