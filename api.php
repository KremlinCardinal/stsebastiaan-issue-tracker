<?php
if(!isset($_SESSION)) {
    session_start();
}

require_once 'class_database.php';
require 'password.php';

$db = new database();

if(isset($_POST['action']) && $_POST['action'] == 'getAll') {
    $issuesQuery = "SELECT issues.id, issues.title, issues.description, issues.created_by, issues.created_on, issues.deadline, issues.supervisor, issues.assigned_to, statusses.status_name, issues.last_edit, categories.cat_name
                    FROM issues, statusses, categories
                    WHERE issues.status = statusses.id
                    AND issues.category = categories.id
                    ORDER BY issues.last_edit DESC, issues.id ASC";

    $usersQuery = "SELECT first_name
                   FROM users
                   ORDER BY id ASC";

    $issuesArray = $db->getArray($issuesQuery);
    $usersArray = $db->getArray($usersQuery);

    $completeArray = processGetAll($issuesArray, $usersArray);

    echo json_encode($completeArray);
}

if(isset($_POST['action']) && $_POST['action'] == 'newIssue') {
    if(empty($_POST['favorite_pizza'])) {
        // do magic

        //process deadline if exists
        if(!empty($_POST['issue_deadline'])) {
            $deadlineArray = explode('-', $_POST['issue_deadline']);
            $issueDeadline = $deadlineArray[2].'-'.$deadlineArray[1].'-'.$deadlineArray[0];
        } else {
            $issueDeadline = '-';
        }

        $pCategory = $db->escapeString($_POST['issue_category']);
        $pDeadline = $db->escapeString($issueDeadline);
        $pTitle = $db->escapeString($_POST['issue_title']);
        $pDescription = $db->escapeString($_POST['issue_description']);
        $pCreatedOn = $db->escapeString(date('Y-m-d'));
        $pUserId = $db->escapeString($_SESSION['user_id']);

        $createQuery = "INSERT INTO issues (title, description, created_by, created_on, deadline, assigned_to, last_edit, category)
                        VALUES (\"$pTitle\", \"$pDescription\", \"$pUserId\", \"$pCreatedOn\", \"$pDeadline\", \"$pUserId\", \"$pCreatedOn\", \"$pCategory\")";
        $db->executeQuery($createQuery);

        echo 'success';
    } else {
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

function getCategories() {
    $db = new database();
    $catQuery = "SELECT id, cat_name FROM categories ORDER BY id ASC";
    $catArray = $db->getArray($catQuery);
    return $catArray;
}