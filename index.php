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
            <li><a class="modal-trigger" href="#">Inloggen</a></li>
            <li><a class="modal-trigger" href="#modal-register">Registreren</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a class="modal-trigger" href="#">Inloggen</a></li>
            <li><a class="modal-trigger" href="#modal-register">Registreren</a></li>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<div id="result">

</div>

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

<div id="modal-register" class="modal">
    <div class="modal-content">
        <div class="row">
            <form id="registration-form" class="col s12">
                <div class="row">
                    <div class="col s12">
                        <h4>Registreren</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input id="favorite_pizza" name="favorite_pizza" type="text" class="validate">
                        <input id="first_name" name="first_name" type="text" class="validate">
                        <label for="first_name">Voornaam<sup>*</sup></label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input id="between_name" name="between_name" type="text" class="validate">
                        <label for="between_name">tussenvoegsel</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input id="last_name" name="last_name" type="text" class="validate">
                        <label for="last_name">Achternaam<sup>*</sup></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">E-mail (hiermee log je in)<sup>*</sup></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Wachtwoord<sup>*</sup></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password2" name="password2" type="password" class="validate">
                        <label for="password2">Wachtwoord herhalen<sup>*</sup></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-ripple btn-flat">Sluiten</a>
        <a id="modal-register-submit" href="#!" class=" modal-action modal-close waves-effect waves-ripple btn-flat">Verzenden</a>
    </div>
</div>

<script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="lib/moment-with-locales.js"></script>
<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="default.js"></script>
<script type="text/javascript" src="functions.js"></script>

</body>
</html>