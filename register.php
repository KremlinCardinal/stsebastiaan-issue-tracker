<?php
session_start();

require_once 'class_database.php';
require 'password.php';

$db = new database();

if(empty($_POST['favorite_pizza'])) {
    //check if entered email already exists
    $email = $db->escapeString($_POST['email']);
    $emailQuery = "SELECT email FROM users WHERE email = \"$email\"";
    $emailResult = $db->executeQuery($emailQuery, true);
    $emailNumRows = mysqli_num_rows($emailResult);

    if($emailNumRows === 0) {
        //register new user
        //hash password using blowfish
        $firstname = $db->escapeString($_POST['first_name']);
        $betweenname = $db->escapeString($_POST['between_name']);
        $lastname = $db->escapeString($_POST['last_name']);
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 10));
        $hashedPassword = $db->escapeString($hash);
//        $registerQuery = "INSERT INTO users (first_name, between_name, last_name, email, hash) VALUES (\"$firstname\", \"$betweenname\", \"$lastname\", \"$email\", \"$hashedPassword\")";
//        $db->executeQuery($registerQuery);
        $_SESSION['register_result'] = 'success';
        header('Location: user-login.php');
    } else {
        //user already exists
        $_SESSION['register_result'] = 'user_already_exists';
        header('Location: user-login.php');
    }
} else {
    //hidden input not empty, bot detected
    $_SESSION['register_result'] = 'bot_detected';
    header('Location: user-login.php');
}
