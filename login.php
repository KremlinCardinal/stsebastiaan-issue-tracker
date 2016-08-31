<?php
session_start();

require_once 'class_database.php';
require 'password.php';

$db = new database();

$pizza = $_POST['favorite_pizza'];
$email = $db->escapeString($_POST['email']);
$password = $_POST['password'];

// First, check if $pizza is empty. If not, our hidden input was filled by a bot
if(empty($pizza)) {
    $emailQuery = "SELECT * FROM users WHERE email = \"$email\"";
    $result = $db->getArray($emailQuery);
    $numRows = count($result);

    if($numRows == 1) {
        //User found
        if($result[0]['active'] == 1) {
            //account is active
            if(password_verify($password, $result[0]['hash'])) {
                //password valid
                //set user as logged in and redirect back to index page
                $_SESSION['logged_in'] = true;
                $_SESSION['user_first_name'] = $result[0]['first_name'];
                $_SESSION['user_between_name'] = $result[0]['between_name'];
                $_SESSION['user_last_name'] = $result[0]['last_name'];
                $_SESSION['user_email'] = $result[0]['email'];
                $_SESSION['user_level'] = $result[0]['level'];
                header('Location: index.php?login=success');
                exit;
            } else {
                //password invalid
                // Invalid username or password
                header('Location: index.php?login=invalid');
                exit;
            }
        } else {
            //Account not active. Wait for activation
            header('Location: index.php?login=inactive');
            exit;
        }
    } elseif($numRows < 1) {
        // user not found
        // Invalid username or password
        header('Location: index.php?login=invalid');
        exit;
    } else {
        // something went wrong
        header('Location: index.php?login=error');
        exit;
    }
} else {
    //bot detected
    header('Location: index.php?login=error');
    exit;
}