<?php

require_once("../controller/session.php");
require_once("../model/class.book.php");
require_once ("check.php");

include "inc/head.php";

$book= new \model\Book();

//list all books

$stmt=$book->list_books("SELECT * FROM books");
$stmt->execute();

//delete book

//if(isset($_REQUEST['did']))
//{
//    $id=$_REQUEST['did'];
//
//    if($book->delete_book($id))
//    {
////        echo "<script>alert('Record deleted successfully')
////		window.location.href='list_books.php'</script>";
//        header('location: list_books.php');
//    }
//    else
//    {
////        echo "<script>alert('Record does not deleted please try again')
////        window.location.href='list_books.php'</script>";
//        header('location: list_books.php?error=not_updated');
//    }
//}


//require_once("../controller/session.php");
//
//require_once("../model/class.user.php");
////	$auth_user = new USER();
////
////
////	$user_id = $_SESSION['user_session'];
////
////	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
////	$stmt->execute(array(":user_id"=>$user_id));
////
////	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//require_once ("check.php");
//include_once "inc/head.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Coding Cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/11/ajax-login-script-with-jquery-php-mysql.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        
        <h1>
        <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp;
        <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>
        <hr />
        
        <p class="h4">Another Secure Profile Page</p> 
        
    <p class="blockquote-reverse" style="margin-top:200px;">
    Programming Blog Featuring Tutorials on PHP, MySQL, Ajax, jQuery, Web Design and More...<br /><br />
    <a href="http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html">tutorial link</a>
    </p>
    
    </div>

</div>




<script src="js/bootstrap.min.js"></script>

</body>
</html>