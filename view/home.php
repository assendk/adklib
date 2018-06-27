<?php

	require_once("../controller/session.php");
	
	require_once("../model/class.user.php");
//	$auth_user = new USER();
//
//
//	$user_id = $_SESSION['user_session'];
//
//	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
//	$stmt->execute(array(":user_id"=>$user_id));
//
//	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    require_once ("check.php");
    include_once "inc/head.php";
?>

<?php //include "inc/nav.php"; ?>

<div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        
        <h1>
        <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; 
        <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>
       	<hr />
        
        <p class="h4">User Home Page</p> 
       
        
    <p class="blockquote-reverse" style="margin-top:200px;">
    Programming Blog Featuring Tutorials on PHP, MySQL, Ajax, jQuery, Web Design and More...<br /><br />
    <a href="http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html">tutorial link</a>
    </p>
    
    </div>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>