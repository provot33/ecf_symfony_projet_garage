<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion administrateur et employes</title>
    <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/html/header.html');
    ?>
    <form method="post">
        <fieldset>
            <legend>Connexion</legend>

            <div>
                <label style="width: 2em;" for="email"><i class="bi bi-envelope-fill"></i></label>
                <input type="email" id="email" placeholder="nom.prenom@yahoo.com">
            </div>
            <div>
                <label style="width: 5em;" for="Mot de passe">Mot de passe:</label>
                <input type="password" id="Prénom" placeholder="********">
            </div>
            <div class="div_center"><button type="submit"> Envoyer</button>
            </div>
        </fieldset>
    </form>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/html/footer.html');
    ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
    ?>
</body>

</html>