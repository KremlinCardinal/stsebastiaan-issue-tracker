<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === false) {
    header('Location: user-login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>St. Sebastiaan - Issue Tracker</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="lib/materialize/css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="css/custom.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<nav class="indigo" role="navigation">
    <div class="nav-wrapper">
        <a id="logo-container" href="" class="brand-logo">St. Sebastiaan - Issue Tracker</a>

        <ul class="right hide-on-med-and-down">
            <li>Ingelogd als: <?= $_SESSION['user_email'] ?></li>
            <li><a class="modal-trigger" href="#">Uitloggen</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li>Ingelogd als:  <?= $_SESSION['user_email'] ?></li>
            <li><a class="modal-trigger" href="#">Uitloggen</a></li>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<div id="result">

</div>

<pre>
    <?php
    print_r($_SESSION);
    ?>
</pre>

<footer class="page-footer indigo">
    <div class="footer-copyright">
        &copy; Copyright 2016 - Michiel Dijk
    </div>
</footer>

<div id="modal-info" class="modal">
    <div class="modal-content">
        <h4>Issue detail</h4>
        <table class="bordered">
            <tr>
                <td class="u-w25">ID</td>
                <td class="u-infomodal-id u-w75" colspan="3"></td>
            </tr>
            <tr>
                <td class="u-w25">Categorie</td>
                <td class="u-infomodal-category u-w25"></td>
                <td class="u-w25">Status</td>
                <td class="u-infomodal-status u-w25"></td>
            </tr>
            <tr>
                <td class="u-w25">Aangemaakt op</td>
                <td class="u-infomodal-createdon u-w25"></td>
                <td class="u-w25">Laatst gewijzigd</td>
                <td class="u-infomodal-lastedit u-w25"></td>
            </tr>
            <tr>
                <td class="u-w25">Deadline</td>
                <td class="u-infomodal-deadline u-w75" colspan="3"></td>
            </tr>
            <tr>
                <td class="u-w25">Aangemaakt door</td>
                <td class="u-infomodal-createdby u-w25"></td>
                <td class="u-w25">Supervisor</td>
                <td class="u-infomodal-supervisor u-w25"></td>
            </tr>
            <tr>
                <td class="u-w25">Toegewezen aan</td>
                <td class="u-infomodal-assignedto u-w75" colspan="3"></td>
            </tr>
            <tr>
                <td class="u-w25">Titel</td>
                <td class="u-infomodal-title u-w75" colspan="3"></td>
            </tr>
            <tr>
                <td class="u-w25">Omschrijving</td>
                <td class="u-infomodal-description u-w75" colspan="3"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-ripple btn-flat">Sluiten</a>
    </div>
</div>

<script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="lib/moment-with-locales.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/additional-methods.min.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/localization/messages_nl.min.js"></script>
<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="js/default.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>