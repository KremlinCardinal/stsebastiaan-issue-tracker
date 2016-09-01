<?php
session_start();

if(!isset($_SESSION['clear_register_result'])) {
    $_SESSION['clear_register_result'] = false;
} elseif($_SESSION['clear_register_result'] === true) {
    $_SESSION['register_result'] = '';
    $_SESSION['clear_register_result'] = false;
}

if(!isset($_SESSION['register_result'])) {
    $_SESSION['register_result'] = '';
    $alertScript = '';
} elseif($_SESSION['register_result'] == 'success') {
    $alertScript = '<script type="text/javascript" src="js/alerts/register_success.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == 'user_already_exists') {
    $alertScript = '<script type="text/javascript" src="js/alerts/user_already_exists.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == 'invalid_username_or_password') {
    $alertScript = '<script type="text/javascript" src="js/alerts/invalid_username_or_password.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == 'account_inactive') {
    $alertScript = '<script type="text/javascript" src="js/alerts/account_inactive.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == 'bot_detected') {
    $alertScript = '<script type="text/javascript" src="js/alerts/bot_detected.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == 'error') {
    $alertScript = '<script type="text/javascript" src="js/alerts/error.js"></script>';
    $_SESSION['clear_register_result'] = true;
} elseif($_SESSION['register_result'] == '') {
    $_SESSION['clear_register_result'] = true;
    $alertScript = '';
} else {
    $alertScript = '<script type="text/javascript" src="js/alerts/error.js"></script>';
    $_SESSION['clear_register_result'] = true;
}

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

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" id="login-form" method="post" action="login.php">
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Inloggen</h4>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input id="favorite_pizza" name="favorite_pizza" type="text" class="validate">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="email" name="email" type="text">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" name="password" type="password">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Inloggen</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="user-register.php">Registreren</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="#">Wachtwoord vergeten</a></p>
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
<?= $alertScript ?>

</body>
</html>
