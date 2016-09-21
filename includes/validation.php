<?php
$value = $_GET['query'];
$formfield = $_GET['field'];
$input= $_GET['input'];

//Check Valid or Invalid password when user enters password in password input field.
if ($input == "email-input") {
    if (strlen($value) < 6) {
        echo "Password is too short(minimum is 6 character)";
    } 
}

//Check Valid or Invalid email when user enters email in email input field.
if ($input == "password-input") {
    if (!preg_match("/^[0-9]{10}$/",$value) | !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
        echo "Enter valid email or mobile number";
    } 
    
}

?>