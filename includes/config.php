<?php


ob_start();
session_start();

// db properties
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','LAWRANCE,291296');
define('DBNAME','shoppingcart');

// make a connection to mysql here
$conn = @mysql_connect (DBHOST, DBUSER, DBPASS);
$conn = @mysql_select_db (DBNAME);

if(!$conn){
	die( "Sorry! There seems to be a problem connecting to our database.");
}

// define site path
define('DIR','Foodies');

// define admin site path
define('DIRADMIN','Foodies/admin/');

// define site title for top of the browser
define('SITETITLE','Simple CMS');

//define include checker
define('included', 1);

include('functions.php');
?>
