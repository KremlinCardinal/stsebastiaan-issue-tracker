<?php
session_start();

require_once 'class_database.php';

$db = new database();

if($_POST['action'] == 'getall') {
    $q = "SELECT issues.id, issues.title, issues.description, users.first_name as created_by, issues.created_on, issues.deadline,  users.first_name as supervisor, users.first_name as assigned_to, statusses.status_name, issues.last_edit, categories.cat_name
          FROM issues, users, statusses, categories
          WHERE issues.created_by = users.id
          AND issues.supervisor = users.id
          AND issues.assigned_to = users.id
          AND issues.status = statusses.id
          AND issues.category = categories.id";

    $json = $db->getJson($q);
    echo $json;
}