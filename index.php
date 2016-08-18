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
    <div class="nav-wrapper container">
        <a id="logo-container" href="" class="brand-logo">St. Sebastiaan - Issue Tracker</a>

        <ul class="right hide-on-med-and-down">
            <li><a class="modal-trigger" href="#contact-modal">Contact</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a class="modal-trigger" href="#contact-modal">Contact</a></li>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titel</th>
                            <th>Aangemaakt door</th>
                            <th>Status</th>
                            <th>Toegewezen aan</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pijlen plakken</td>
                            <td>Michiel</td>
                            <td><span class="c-badge u-new u-badge-assigned">Toegewezen</span></td>
                            <td>Joop</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Gras maaien</td>
                            <td>Jeroen</td>
                            <td><span class="c-badge u-new u-badge-new">Nieuw</span></td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Stofzuigen</td>
                            <td>Jeroen</td>
                            <td><span class="c-badge u-new u-badge-acknowledged">Opgepakt</span></td>
                            <td>Henk</td>
                            <td>19-09-2016</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Doelpakken repareren</td>
                            <td>Edwin</td>
                            <td><span class="c-badge u-new u-badge-assigned">Toegewezen</span></td>
                            <td>Edwin</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Gras maaien</td>
                            <td>Jeroen</td>
                            <td><span class="c-badge u-new u-badge-new">Nieuw</span></td>
                            <td>-</td>
                            <td>23-10-2016</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Stofzuigen</td>
                            <td>Jeroen</td>
                            <td><span class="c-badge u-new u-badge-acknowledged">Opgepakt</span></td>
                            <td>Henk</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="page-footer indigo">
    <div class="footer-copyright">
        <div class="container">
            &copy; Copyright 2016 - Michiel Dijk
        </div>
    </div>
</footer>

<script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="functions.js"></script>

</body>
</html>