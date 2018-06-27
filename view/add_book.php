<?php

require_once("../controller/session.php");
require_once("../model/class.book.php");
require_once ("check.php");

include "inc/head.php";

$book = new \model\Book();

//save record

if(isset($_REQUEST['save']))
{


    $book_name=$_REQUEST['book_name'];
    $isbn=$_REQUEST['isbn'];
    $description=$_REQUEST['description'];
    $year= $_REQUEST['year'];

//    $book_pic= $_REQUEST['book_pic'];
    $imgFile = $_FILES['book_pic']['name'];
    $tmp_dir = $_FILES['book_pic']['tmp_name'];
    $imgSize = $_FILES['book_pic']['size'];

    $stmt=$book->list_books("select * from books where book_name=:name");
    $stmt->execute(array(":name"=>$book_name));
    $checkrow=$stmt->fetch(PDO::FETCH_ASSOC);

    if($imgFile) {
        $upload_dir = "../view/book_images/"; // upload directory
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $book_pic = rand(1000,1000000)."-".$book_name.".".$imgExt;
        if(in_array($imgExt, $valid_extensions))
        {
            if($imgSize < 5000000)
            {
                move_uploaded_file($tmp_dir,$upload_dir.$book_pic);
//                unlink($upload_dir.$checkrow['book_pic']);
            }
            else
            {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        }
        else
        {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    else
    {
        // if no image selected the old image remain as it is.
        $book_pic = $checkrow['book_pic']; // old image from database
    }


    if($stmt->rowCount() > 0) {
        echo "<script>alert('Book Name is already exists please try other name')
		window.location.href=add_book.php</script>";
    }
    else {
        if($book->library($book_name,$isbn,$description,$year,$book_pic))
        {
//            echo "<script>alert('Book added successfuly')
//			window.location.href='index.php'</script>";
        }
        else
        {
//            echo "<script>alert('Book does not added please try again')
//			window.location.href='index.php'</script>";
        }
    }


}
?>


<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<!--<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />-->

<!--Font Awesome (added because you use icons in your prepend/append)-->
<!--<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />-->

<!-- Inline CSS based on choices in "Settings" tab -->
<!--<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>-->

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
    <div class="container-fluid">

        <center> <h2 style="color:red"><strong> Add New Book </strong></h2></center>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <form method="post" enctype="multipart/form-data">


                    <div class="form-group ">

                        <div class="input-group">
                            <div class="input-group-addon">
                                Book Name
                            </div>
                            <input class="form-control"  name="book_name" placeholder="Enter Book Name" type="text" required />
                            <div class="input-group-addon">
                                <i class="fa fa-shopping-cart">
                                </i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">

                        <div class="input-group">
                            <div class="input-group-addon">
                                ISBN
                            </div>
                            <input class="form-control" id="isbn" name="isbn" placeholder="Enter Quantity" type="number"  required />
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
                            <input class="form-control" id="year" name="year" placeholder="Enter Year" type="number" maxlength="4" required />
                            <div class="input-group-addon">
                                <i class="fa fa-database">
                                </i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Description
                            </div>
                            <input class="form-control" id="description" name="description" placeholder="Enter Description" type="text"  required />
                            <div class="input-group-addon">
                                <i class="fa fa-money">
                                </i>
                            </div>
                        </div>
                    </div>
<!--                    <div class="form-group ">-->
<!--                        <div class="input-group">-->
<!--                            <div class="input-group-addon">-->
<!--                                Book cover:-->
<!--                            </div>-->
<!--                            <div class="input-group-addon">-->
<!--                                <i class="fa fa-money">-->
<!--                                </i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div>
                        <input class="" id="book_pic" name="book_pic" placeholder="Enter Description" type="file" accept="image/*"  required />
                    </div>
                    <br>

                    <center>
                        <div class="form-group">
                            <div>

                                <button class="btn btn-primary " name="save" type="submit">
                                    Save
                                </button>

                                <a href="list_books.php" class="btn btn-primary ">
                                    Cancel
                                </a>

                            </div>
                        </div>
                    </center>

                </form>
            </div>
        </div>
    </div>
</div>