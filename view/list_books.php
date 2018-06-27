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

if(isset($_REQUEST['did']))
{
    $id=$_REQUEST['did'];

    if($book->delete_book($id))
    {
//        echo "<script>alert('Record deleted successfully')
//		window.location.href='list_books.php'</script>";
        header('location: list_books.php');
    }
    else
    {
        echo "<script>alert('Record does not deleted please try again')
		window.location.href='list_books.php'</script>";
    }
}

?>
<div class="clearfix"></div>


<!--<div class="container-fluid" style="margin-top:80px;">-->
<div class="container" style="">

<h2>List All Books</h2>

    <form method="post">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>

                <th>ISBN</th>
                <th>Description</th>
                <th>Year</th>
                <th>Added On</th>
                <th>Update/Delete</th>
            </tr>
            </thead>

            <tbody>
            <?php  $i=1;
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['book_name'];?></td>

                    <td><?php echo $row['isbn'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td><?php echo date("d/m/Y H:i:s",strtotime($row['added_on']));?></td>
                    <td><img height="40px" src="book_images/<?php echo $row['book_pic'];?>" alt=""></td>
                    <td><?php var_dump($row['book_pic']); ?></td>
                    <td>
                        <a class="btn btn-primary btn-flat" href="update_book.php?editId=<?php echo $row['id'];?>"><i class="fa fa-lg fa-plus">edit</i></a>
                        <a class="btn btn-warning btn-flat" onclick="return confirm('Are you sure?')" href="list_books.php?did=<?php echo $row['id'];?>"><i class="fa fa-lg fa-trash">delete</i></a></td>
                </tr>

                <?php $i++;
            } ?>

            </tbody>
        </table>
    </form>
</div>