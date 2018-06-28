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

//var_dump($book_pic);
if ($book_pic === NULL || $book_pic==""){
    $book_pic = "default.jpg";
}
//Update record

if(isset($_REQUEST['edit']))
{
    $editId=$_GET['editId'];

    $book_name=$_REQUEST['book_name'];
    $isbn=$_REQUEST['isbn'];
    $description=$_REQUEST['description'];
    $year= $_REQUEST['year'];

    if($book_pic === NULL || $book_pic==""){
        $book_pic = "default.jpg";
    };

    if(isset($_REQUEST['edit'])) {
        $imgFile = $_FILES['book_pic']['name'];
        $tmp_dir = $_FILES['book_pic']['tmp_name'];
        $imgSize = $_FILES['book_pic']['size'];


        if ($imgFile) {
            $upload_dir = "../view/book_images/"; // upload directory
            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $book_pic = rand(1000, 1000000) . "-" . $book_name . "." . $imgExt;
            if (in_array($imgExt, $valid_extensions)) {
                if ($imgSize < 5000000) {
                    move_uploaded_file($tmp_dir, $upload_dir . $book_pic);
//                unlink($upload_dir.$checkrow['book_pic']);
                } else {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            } else {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
    }
    else
    {
        // if no image selected the old image remain as it is.
//        $book_pic = $_REQUEST['book_pic']; // old image from database
        $book_pic = 'default.jpg';
    }




    if($book->update($editId,$book_name,$isbn,$description,$year,$book_pic))
    {
//        echo "<script>alert('Book Updated successfuly')
//			window.location.href=list_books.php/script>";
    }
    else{
        echo "<script>alert('Book does not Updated please try again')
			window.location.href=llist_books.phpscript>";

    }



}


//cancel button
if(isset($_REQUEST['cancel']))
{
    header("location:admin_list_books.php");
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
    <div class="container">

        <h2 class="title"><strong> Update Book </strong></h2>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <form method="post" enctype="multipart/form-data">


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

                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Description
                            </div>
                            <p><img src="book_images/<?php echo $book_pic; ?>" height="150" width="100" /></p>
<!--                            <input class="form-control" id="book_pic" name="book_pic" placeholder="Enter Description" type="file" value="--><?php // echo $book_pic;?><!--" required />-->
                            <input class="form-control" id="book_pic" name="book_pic" type="file"/>
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