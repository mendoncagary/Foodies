<?php	
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($_POST['action'] == "login")
{


if(empty($_POST["txtemailvalue"]))
	{
		//echo $response1;
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
		//echo $response1;
	}
	}
	
	if(empty($_POST["txtupassvalue"]) && strlen($_POST["txtupassvalue"]) <= '6')
	{
		//echo $response2;
	}
	else
	{
	$password =  $_POST["txtupassvalue"];
	$passwordset="true";
	}
	
    if(isset($emailset) && isset($passwordset))
	{
		$user_login->login($email,$password);
		if($user_login->is_logged_in())
		{
	  				
                            $stmt = $user_login -> runQuery("select * from tbl_users WHERE userID = :id");
							$stmt->execute(array(":id"=>$_SESSION['userSession']));
							
							
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
	                         echo $row["userName"];
                            }
        }	

	}
}
?>