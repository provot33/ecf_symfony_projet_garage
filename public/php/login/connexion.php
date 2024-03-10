<!DOCTYPE html>
<html lang="fr">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion administrateur et employes</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap">
    <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/header.html';
?>
    <form action="/php/commons/initialise_connexion.php" method=POST>
        <fieldset>
            <legend>Connexion</legend>
            <div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="Login">Identifiant :</label>
                </div>
                <div class="formulaire_champ div_gauche">
                    <input type="email" id="Login" name="Login" placeholder="nom.prenom@yahoo.com">
                </div>
            </div>
            <div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="Password">Mot de passe :</label>
                </div>
                <div class="formulaire_champ div_gauche">
                    <input type="password" id="Password" name="Password" placeholder="********">
                </div>
            </div>
            <div class="div_centre"><button type="submit"> Envoyer</button>
            </div>
        </fieldset>
    </form>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
</body>

</html>