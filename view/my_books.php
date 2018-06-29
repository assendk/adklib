<?php

require_once("../controller/session.php");
require_once("../model/class.book.php");
require_once ("check.php");

include "inc/head.php";

$book= new \model\Book();

//list all books
//$stmt=$book->list_books("SELECT * FROM books");

//SELECT * FROM mybooks WHERE user_id=:id
$sql = "
SELECT bo.*
FROM users as us
INNER JOIN mybooks as mb ON us.user_id = mb.user_id
INNER JOIN books as bo ON mb.book_id = bo.id
WHERE us.user_id=:id
";
$stmt=$book->list_books($sql);
$stmt->bindparam(":id",$user_id);
$stmt->execute();
//var_dump("RC:",$stmt->rowCount());
var_dump($user_id);
?>

<div class="clearfix"></div>


<div class="container">
    <div class="row">
        <ul class="list-group">
            <?php

            if($stmt->rowCount() > 0) {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    extract($row);
                    ?>

                    <li class="col-sm-4 book-field">
                        <h4 class="book-header"> <?php echo $book_name."&nbsp; - Year:".$year; ?></h4>
                        <p>ISBN: <?php echo $isbn ?></p>
                        <img src="book_images/<?php echo $row['book_pic']; ?>" class="img-rounded" width="auto" height="120px" />
                        <p class="book-info">
                <span>
        <!--            update_book.php?editId=--><?php //echo $row['id'];?>
                    <a class="btn btn-info" href="update_book.php?editId=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <!--        <a class="btn btn-danger" href="?delete_id=--><?php //echo $row['userID']; ?><!--" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>-->
                </span>
                        </p>
                        <p>Desc: <?php echo $row['description'];?></p>

                    </li>
                    <?php
                }
            }

            else
            {
                ?>
                <div class="col-xs-12">
                    <div class="alert alert-warning">
                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                    </div>
                </div>
                <?php
            }
            ?>
        </ul>
    </div>


    <!--    <div class="container">-->
    <!--    -->
    <!--    	<label class="h5">welcome : --><?php //print($userRow['user_name']); ?><!--</label>-->
    <!--        <hr />-->
    <!--        -->
    <!--        <h1>-->
    <!--        <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; -->
    <!--        <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>-->
    <!--       	<hr />-->
    <!--        -->
    <!--        <p class="h4">User Home Page</p> -->
    <!---->
    <!--    </div>-->

</div>

<!--<script src="js/bootstrap.min.js"></script>-->

</body>
</html>