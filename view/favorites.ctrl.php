<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//function __autoload($class)
//{
//    $class = "..\\" . $class;
//    require_once str_replace("\\", "/", $class) . ".php";
//}
require_once("../controller/session.php");
require_once("../model/class.book.php");
require_once ("../controller/check.ctrl.php");

var_dump("usesss",$userRow);

require_once "../model/class.book.php";
$book= new \model\Book();

//list all books

$stmt=$book->editFavorites("SELECT bo.*, mb.fstatus FROM books as bo LEFT JOIN mybooks as mb ON mb.book_id = bo.id ");
//$stmt=$this->conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump("RC:",$stmt->rowCount());
//var_dump($result);

//require_once "../model/DBManager.php";
//$pdo = \model\DBManager::getInstance()->getConnection();
$owner_id = "";
$err_msga = [];

if (isset($_POST['book_id']) && $_POST['fstatus']) {
    $book_id = trim(htmlentities($_POST['book_id']));
    $fstatus = trim(htmlentities($_POST['fstatus']));
    if(!empty($_SESSION['user_id'])) {
        $owner_id = $_SESSION['user_id'];
    }
    //TODO currency;

    try {
//        $sql = "INSERT INTO accounts (account_name, ammount, account_desc, owner_id) VALUES (?,?,?,?)";
        $sql = "INSERT INTO mybooks (book_id, user_id, fstatus) VALUES (?,?,?)";
        $stmt=$book->editFavorites($sql);
        $stmt->execute([$book_id, $userRow['user_id'],$fstatus]);
//        $query = $pdo->prepare($sql);
//
//        $query->execute(array($account_name, $ammount, $account_desc, $owner_id));
        $_SESSION['error-account'] = null;
    } catch (PDOException $e) {
        echo 'PDOException : ' . $e->getMessage();
    }
}
else {
    //echo "Empty fields not permited";
    //$err_msga =  "Empty fields are not permited";
    $_SESSION['error-account'] = "Empty fields are not permited";
}


// list_members : this file displays the list of members in a table view
//include('../view/includes/show_user_accounts_list.incl.php');
echo "Updated";
//header('Location:list_books.php');