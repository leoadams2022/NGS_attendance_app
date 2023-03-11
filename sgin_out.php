<?php
session_start();
include 'clasess/Token_Class.php';
//remove cookie
$token_class = new Token_Class();
$token_class->delete_remember_me_token($_SESSION["user_name"]);
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header('location: sgin_in.php');
// print_r($_SESSION)

?>