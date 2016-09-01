<?php
session_start();
$_SESSION['register_result'] = '';
$_SESSION['clear_register_result'] = false;

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>SSIT</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="lib/materialize/css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="css/user-login.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="indigo">

<div id="register-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="registration-form" id="registration-form" method="post" action="register.php">
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Registreren</h4>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input id="favorite_pizza" name="favorite_pizza" type="text" class="validate">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label for="first_name">Voornaam<sup>*</sup></label>
                </div>
                <div class="input-field col s12">
                    <input id="between_name" name="between_name" type="text" class="validate no-icon">
                    <label for="between_name">tussenvoegsel</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_name" name="last_name" type="text" class="validate no-icon">
                    <label for="last_name">Achternaam<sup>*</sup></label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">E-mail (hiermee log je in)<sup>*</sup></label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Wachtwoord<sup>*</sup></label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password2" name="password2" type="password" class="validate">
                    <label for="password2">Wachtwoord herhalen<sup>*</sup></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Registreren</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <p class="margin center medium-small">Heeft u al een account? <a href="user-login.php">Inloggen</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/additional-methods.min.js"></script>
<script type="text/javascript" src="lib/jquery-validation-1.15.1/localization/messages_nl.min.js"></script>
<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
