<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_roles.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon_garage_carrosserie_vente_vehicule_occasion</title>
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
include($_SERVER['DOCUMENT_ROOT'] . '/php/commons/header_authent.php');
?>

<main>
    <h1>Définir les accès pour un nouveau membre du personnel :</h1>
    <form id="personnel_form" name="personnel_form" method="post">
      <fieldset>
        <legend>Détail des informations</legend>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label for="nom">Nom du salarié :</label>
          </div>
          <div class="formulaire_champ">
            <input name="nom" id="nom" type="text" placeholder="Dupont.....">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 5em;" for="prenom">Prénom du salarié :</label>
          </div>
          <div class="formulaire_champ">
            <input name="prenom" id="prenom" type="text" placeholder="José...">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 2em;" for="email"><i class="bi bi-envelope-fill"></i></label>
          </div>
          <div class="formulaire_champ">
            <input name="email" id="email" type="email" placeholder="nom.prenom@email.com">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
          <label style="width: 2em;" for="password">Mot de passe :</label>
          </div>
          <div class="formulaire_champ">
            <input name="password" id="password" type="password" placeholder="********">
          </div>
        </div>
        <div class="formulaire_contact" id="formulaire_erreurs">

        </div>
        </div>
        <div id="boutonCreerSalarie" class="div_center">
          <button type="submit">Créer le salarié</button>
        </div>
      </fieldset>
    </form>
  </main>



<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
<script src="/js/gestion_creation.js"></script>
</body>

</html>