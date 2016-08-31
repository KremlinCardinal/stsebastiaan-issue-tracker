<?php
session_start();

require_once 'class_database.php';
require 'password.php';

$db = new database();

if($_POST['action'] == 'getAll') {
    $issuesQuery = "SELECT issues.id, issues.title, issues.description, issues.created_by, issues.created_on, issues.deadline, issues.supervisor, issues.assigned_to, statusses.status_name, issues.last_edit, categories.cat_name
                    FROM issues, statusses, categories
                    WHERE issues.status = statusses.id
                    AND issues.category = categories.id
                    ORDER BY issues.id ASC";

    $usersQuery = "SELECT first_name
                   FROM users
                   ORDER BY id ASC";

    $issuesArray = $db->getArray($issuesQuery);
    $usersArray = $db->getArray($usersQuery);

    $db->closeConnection();

    $completeArray = processGetAll($issuesArray, $usersArray);

    echo json_encode($completeArray);
}

if($_POST['action'] == 'registerUser') {
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
            $registerQuery = "INSERT INTO users (first_name, between_name, last_name, email, hash) VALUES (\"$firstname\", \"$betweenname\", \"$lastname\", \"$email\", \"$hashedPassword\")";
            $db->executeQuery($registerQuery);
            echo 'success';
        } else {
            //user already exists
            echo 'user_already_exists';
        }
    } else {
        //hidden input not empty, bot detected
        echo 'bot_detected';
    }
}


function processGetAll($issuesArray, $usersArray) {
    $issuesArrayLength = count($issuesArray);

    for ($i = 0; $i < $issuesArrayLength; $i++) {
        $issuesArray[$i]['created_by'] = $usersArray[($issuesArray[$i]['created_by']-1)]['first_name'];
        $issuesArray[$i]['supervisor'] = $usersArray[($issuesArray[$i]['supervisor']-1)]['first_name'];
        $issuesArray[$i]['assigned_to'] = $usersArray[($issuesArray[$i]['assigned_to']-1)]['first_name'];
    }

    return $issuesArray;
}