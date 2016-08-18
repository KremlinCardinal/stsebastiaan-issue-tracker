<?php
session_start();
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
            <li><a class="modal-trigger" href="#contact-modal">Login</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a class="modal-trigger" href="#contact-modal">Login</a></li>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<table class="striped responsive-table">
    <thead>
        <tr>
            <th class="firstcol">ID</th>
            <th>Titel</th>
            <th>Toegewezen aan</th>
            <th>Deadline</th>
            <th>Status</th>
            <th class="lastcol">Info</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="firstcol">1</td>
            <td>Pijlen plakken</td>
            <td>Joop, Tjeerd</td>
            <td>-</td>
            <td><span class="c-badge u-new u-badge-assigned">Toegewezen</span></td>
            <td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>
        </tr>
        <tr>
            <td class="firstcol">2</td>
            <td>Gras maaien</td>
            <td>-</td>
            <td>-</td>
            <td><span class="c-badge u-new u-badge-new">Nieuw</span></td>
            <td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>
        </tr>
        <tr>
            <td class="firstcol">3</td>
            <td>Stofzuigen</td>
            <td>Henk, Hans</td>
            <td>19-09-2016</td>
            <td><span class="c-badge u-new u-badge-acknowledged">Opgepakt</span></td>
            <td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>
        </tr>
        <tr>
            <td class="firstcol">4</td>
            <td>Doelpakken repareren</td>
            <td>Edwin, Joop</td>
            <td>-</td>
            <td><span class="c-badge u-new u-badge-assigned">Toegewezen</span></td>
            <td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>
        </tr>
    </tbody>
</table>

<footer class="page-footer indigo">
    <div class="footer-copyright">
        &copy; Copyright 2016 - Michiel Dijk
    </div>
</footer>

<div id="modal-info" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>

<script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="default.js"></script>
<script type="text/javascript" src="functions.js"></script>

</body>
</html>