<?php

require_once("../controller/session.php");
require_once("../model/class.book.php");
require_once ("check.php");

include "inc/head.php";


$book = new \model\Book();

//get Edit id's data

if(isset($_GET['editId']))
{
    $editId=$_GET['editId'];
    extract($book->getId($editId));
}


//Update record

if(isset($_REQUEST['edit']))
{
    $editId=$_GET['editId'];

    $book_name=$_REQUEST['book_name'];
    $isbn=$_REQUEST['isbn'];
    $description=$_REQUEST['description'];
    $year= $_REQUEST['year'];

    if($book->update($editId,$book_name,$isbn,$description,$year))
    {
//        echo "<script>alert('Book Updated successfuly')
//			window.location.href=list_books.php/script>";
    }
    else{
//        echo "<script>alert('Book does not Updated please try again')
//			window.location.href=llist_books.phpscript>";

    }

}


//cancel button
if(isset($_REQUEST['cancel']))
{
    header("location:list_books.php");
}

?>

<div class="clearfix"></div>



<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<!--<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />-->

<!--Font Awesome (added because you use icons in your prepend/append)-->
<!--<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />-->

<!-- Inline CSS based on choices in "Settings" tab -->
<!--<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>-->



<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
    <div class="container-fluid">

        <center> <h2 style="color:red"><strong> Update Book </strong></h2></center>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <form method="post">


                    <input type="hidden" name="editId" value="<?php echo $editId ;?>" >



                    <div class="form-group ">
<!--                        <label class="control-label requiredField" for="book_name">-->
<!--                            Book Name-->
<!--                            <span class="asteriskField">-->
<!--        *-->
<!--       </span>-->
<!--                        </label>-->
                        <div class="input-group">
                            <div class="input-group-addon">
                                Book Name
                            </div>
                            <input class="form-control"  name="book_name" placeholder="Enter Book Name" type="text" value="<?php echo $book_name;?>" required />
                            <div class="input-group-addon">
                                <i class="fa fa-shopping-cart">
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Quantity
                            </div>
                            <input class="form-control" id="isbn" name="isbn" placeholder="Enter Quantity" type="number" value="<?php echo $isbn;?>" required />
                            <div class="input-group-addon">
                                <i class="fa fa-database">
                                </i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Year
                            </div>
                            <input class="form-control" id="year" name="year" placeholder="Enter year" type="text" value="<?php  echo $year;?>" required />
                            <div class="input-group-addon">
                                <i class="fa fa-money">
                                </i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">

                        <div class="input-group">
                            <div class="input-group-addon">
                                Description
                            </div>
                            <input class="form-control" id="description" name="description" placeholder="Enter Description" type="text" value="<?php  echo $description;?>" required />
                            <div class="input-group-addon">
                                <i class="fa fa-money">
                                </i>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="edit" type="submit">
                                    Update
                                </button>
                                <button class="btn btn-primary " name="cancel" type="submit">
                                    Back
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>