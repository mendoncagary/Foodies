<?php
$value = $_GET['query'];
$formfield = $_GET['field'];
$input= $_GET['input'];

//Check Valid or Invalid password when user enters password in password input field.
if ($input == "email-input") {
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        echo "Enter valid email or mobile number"; 
    } 
}

//Check Valid or Invalid email when user enters email in email input field.
if ($input == "password-input") {
    if (strlen($value) < 6) {
        echo "Password is too short(minimum is 6 character)";
    } 
    
}

?>