<?php

class DBManager
{

    private $server="localhost";
    private $username="demo1";
    private $password="pass1";
    private $db_name="adklib";

    public $conn;

    public function dbConnection()
    {
        $this->conn=null;

        try{
            $this->conn=new PDO("mysql:host=". $this->server . ";dbname=" . $this->db_name, $this->username, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            echo "Connection Error:" .$ex->getMessage();
        }

        return $this->conn;
    }

}
?>