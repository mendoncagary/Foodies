<?php

require_once 'class.user.php';
$user_login = new USER();


if($_POST['action'] == "login")
{
	$response1 = "email error";
	$response2 = "password error";
	
	
	if(empty($_POST["txtemailvalue"]))
	{
		echo $response1;
	}
	 else 
	{
	$email = $_POST["txtemailvalue"];	
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
	{
		$emailset = "true";
		
	}
	else
	{
		echo $response1;
	}
	}
	
	if(empty($_POST["txtupassvalue"]) && strlen($_POST["txtupassvalue"]) <= '6')
	{
		echo $response2;
	}
	else
	{
	$password =  $_POST["txtupassvalue"];
	$passwordset="true";
	}
	
	if(isset($emailset) && isset($passwordset))
	{
		$user_login->login($email,$password);
	   if($user_login->is_logged_in() == true)
	    {
			$response3 = "logged in";
		echo $response3;
		
	     }
		 else{
			 echo $response1;
			 
		 }
	}
	
	
}


?>