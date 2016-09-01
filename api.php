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

function processGetAll($issuesArray, $usersArray) {
    $issuesArrayLength = count($issuesArray);

    for ($i = 0; $i < $issuesArrayLength; $i++) {
        $issuesArray[$i]['created_by'] = $usersArray[($issuesArray[$i]['created_by']-1)]['first_name'];
        $issuesArray[$i]['supervisor'] = $usersArray[($issuesArray[$i]['supervisor']-1)]['first_name'];
        $issuesArray[$i]['assigned_to'] = $usersArray[($issuesArray[$i]['assigned_to']-1)]['first_name'];
    }

    return $issuesArray;
}