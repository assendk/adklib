<?php


//include connection file
namespace model;
require_once "dbconfig.php";

use PDO;

class Book
{

    private $conn;

    //constructor

    public function __construct()
    {
        $database=new \DBManager();
        $db= $database->dbConnection();
        $this->conn= $db;
    }


    //function for Insert record

    public function library($book_name,$isbn,$description,$year)
    {
        try
        {
            $stmt= $this->conn->prepare("insert into books(book_name,
								isbn,description,year)values(:book_name,
								:isbn, :description, :year) ");


            $stmt->bindparam(":book_name",$book_name);
            $stmt->bindparam(":isbn",$isbn);
            $stmt->bindparam(":description",$description);
            $stmt->bindparam(":year",$year);
            $stmt->execute();
            return $stmt;

        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return false;
        }
    }



    //function for sql query

    public function list_books($sql)
    {
        $stmt=$this->conn->prepare($sql);
        return $stmt;

    }

    //function for Delete record

    public function delete_book($did)
    {
        $stmt=$this->conn->prepare("delete from books where id=:id");
        $stmt->bindparam(":id",$did);
        $stmt->execute();
        return true;
    }


    //function for get Edit Id's data

    public function getId($editId)
    {
        $stmt=$this->conn->prepare("select * from books where id=:editId");
        $stmt->execute(array(":editId"=>$editId));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }

    //function for Update record

    public function update($editId,$book_name,$isbn,$description,$year)
    {
        try
        {

            $stmt=$this->conn->prepare("update books set 
										book_name=:book_name, isbn=:isbn, 
										description=:description, year=:year where id=:editId");


            $stmt->bindparam(":book_name",$book_name);
            $stmt->bindparam(":isbn",$isbn);
            $stmt->bindparam(":description",$description);
            $stmt->bindparam(":year",$year);
            $stmt->bindparam(":editId",$editId);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex-> getMessage();
            return false;
        }
    }

}

?>