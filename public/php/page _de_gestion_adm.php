<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gestion_administrateur_du_site</title>
  <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/html/header.html');
  ?>
  <div>
    <form method="post">
      <fieldset>
        <legend>Gestion horaires d'ouverture du garage</legend>

        <div><label for="Jour de la semaine"> Jour de la semaine</label>
          <select>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedi">Samedi</option>
            <option value="Dimnanche">Dimnanche </option>
            <option value="Jour férié">Jour férié</option>
          </select>
        </div>
        <div><label for="Heures"> Heures matin</label>
          <select>
            <option value="8hoo">8h00</option>
            <option value="9hoo">9h00</option>
            <option value="10H00">10h00</option>
            <option value="11H00">11h00</option>
            <option value="12H00">12h00</option>
            <option value="13H00">13h00</option>
          </select>
        </div>
        <div><label for="Heures"> Heures matin</label>
          <select>
            <option value="8hoo">8h00</option>
            <option value="9hoo">9h00</option>
            <option value="10H00">10h00</option>
            <option value="11H00">11h00</option>
            <option value="12H00">12h00</option>
            <option value="13H00">13h00</option>
          </select>
        </div>
        <div><label for="Heures"> Heures aprés-midi</label>
          <select>
            <option value="13H00">13h00</option>
            <option value="14H00">14h00 </option>
            <option value="15H00">15h00 </option>
            <option value="16H00">16h00 </option>
            <option value="17H00">17hoo </option>
            <option value="18H00">18h00 </option>
            <option value="19H00">19h00 </option>
            <option value="20H00">20h00 </option>
            <option value="Fermé">Fermé</option>
          </select>
        </div>
        <div><label for="Heures"> Heures aprés-midi</label>
          <select>
            <option value="13H00">13h00</option>
            <option value="14H00">14h00 </option>
            <option value="15H00">15h00 </option>
            <option value="16H00">16h00 </option>
            <option value="17H00">17hoo </option>
            <option value="18H00">18h00 </option>
            <option value="19H00">19h00 </option>
            <option value="20H00">20h00 </option>
            <option value="Fermé">Fermé</option>
          </select>
        </div>
        <div class="div_center">
          <button type="submit"> Envoyer</button>
        </div>
        <div>
          <form method="post">
            <fieldset>
              <legend>Création de compte du personnel</legend>
              <div>
                <label for="Matricule">Matricule:</label>
                <input type="text" id="Nom" placeholder="Dupont.....">
              </div>
              <div>
                <label for="Nom">Nom:</label>
                <input type="text" id="Nom" placeholder="Dupont.....">
              </div>
              <div>
                <label style="width: 5em;" for="Prénom">Prénom:</label>
                <input type="text" id="Prénom" placeholder="José...">
              </div>
              <div>
                <label style="width: 2em;" for="email"><i class="bi bi-envelope-fill"></i></label>
                <input type="email" id="email" placeholder="nom.prenom@yahoo.com">
                <div>
                  <div class="div_center">
                    <button type="submit"> Envoyer</button>
                  </div>
          </form method="post">
        </div>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/html/footer.html');
        ?>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
        ?>
</body>

</html>