<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
	require_once '../model/class.user.php';
	$session = new USER();
	
	if(!$session->is_loggedin())
	{
		// session no set redirects to login page
		$session->redirect('index.php');
	}