<!DOCTYPE html>
<html lang="fr">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>contacter le garage</title>
  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link href="/css/rating.css" rel="stylesheet" type="text/css" />
  <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Karma:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap">
</head>

<body>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/html/header.html');
  ?>

  <main>
    <h1> Pour toute demande, veuillez nous contacter via notre formulaire de contact:</h1>
    <form method="post">
      <fieldset>
        <legend>formulaire de contact</legend>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label for="Nom">Mon nom:</label>
          </div>
          <div class="formulaire_champ">
            <input type="text" id="Nom" placeholder="Dupont.....">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 5em;" for="Prénom">Mon prénom:</label>
          </div>
          <div class="formulaire_champ">
            <input type="text" id="Prénom" placeholder="José...">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 2em;" for="téléphone"><i class="bi bi-telephone-fill"></i></label>
          </div>
          <div class="formulaire_champ">
            <input type="text" id="téléphone" placeholder="06...">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 2em;" for="email"><i class="bi bi-envelope-fill"></i></label>
          </div>
          <div class="formulaire_champ">
            <input type="email" id="email" placeholder="nom.prenom@yahoo.com">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label for="Objet"> Objet</label>
          </div>
          <div class="formulaire_champ">
            <select>
              <option value="achat véhicule occasion">achat véhicule occasion</option>
              <option value="réparation carrosserie">réparation carrosserie</option>
              <option value="réparation panne véhicule">réparation véhicule</option>
              <option value="deamnde de contrôle technique">demande de contrôle technique</option>
              <option value="autre">autre</option>
            </select>
          </div>
        </div>
        <div class="formulaire_contact">
          <textarea id="Message" rows="10" , cols="40">Mon message:</textarea>
        </div>
        <div class="div_centre">
          <button type="submit"> Envoyer</button>
        </div>
      </fieldset>
    </form>
    <form method="post">
      <fieldset>
        <legend>Laissez-nous un commentaire:</legend>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label for="Nom">Mon nom:</label>
          </div>
          <div class="formulaire_champ">
            <input type="text" id="Nom" placeholder="Dupont.....">
          </div>
        </div>
        <div class="formulaire_contact">
          <div class="formulaire_label">
            <label style="width: 5em;" for="Prénom">Mon prénom:</label>
          </div>
          <div class="formulaire_champ">
            <input type="text" id="Prénom" placeholder="José...">
          </div>
        </div>

        <div class="feedback formulaire_contact">
          <label class="angry">
            <input type="radio" value="1" name="feedback" />
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
              <svg class="mouth">
                <use xlink:href="#mouth">
              </svg>
            </div>
          </label>
          <label class="sad">
            <input type="radio" value="2" name="feedback" />
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
              <svg class="mouth">
                <use xlink:href="#mouth">
              </svg>
            </div>
          </label>
          <label class="ok">
            <input type="radio" value="3" name="feedback" />
            <div></div>
          </label>
          <label class="good">
            <input type="radio" value="4" name="feedback" checked />
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
              <svg class="mouth">
                <use xlink:href="#mouth">
              </svg>
            </div>
          </label>
          <label class="happy">
            <input type="radio" value="5" name="feedback" />
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
            </div>
          </label>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
            <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
          </symbol>
          <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
            <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
          </symbol>
        </svg>

        <div class="formulaire_deux_colonnes">
          <textarea id="Message" rows="10" , cols="40">Mon avis:</textarea>
        </div>
        <div class="div_centre">
          <button type="submit"> Envoyer</button>
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
</body>

</html>