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
    <h1>Exprimez-vous et dites ce que vous pensez de nous :</h1>
    <form id="avis_form" name="avis_form" method="post">
      <fieldset>
        <legend>Laissez-nous un commentaire :</legend>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="nom">Mon nom :</label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input type="text" id="nom" name="nom" placeholder="Dupont.....">
          </div>
        </div>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="prenom">Mon prénom :</label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input type="text" id="prenom" name="prenom" placeholder="José...">
          </div>
        </div>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="email"><i class="bi bi-envelope-fill"></i></label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input name="email" id="email" type="email" placeholder="nom.prenom@email.com">
          </div>
        </div>
        <div class="feedback formulaire_contact div_centre">
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
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
              <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
              <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
            </symbol>
          </svg>
        </div>

        

        <div class="formulaire_champ div_centre">
          <textarea name="message" id="message" rows="10" , cols="34" placeholder="Mon avis :"></textarea> 
        </div>
        <div class="formulaire_contact div_centre" id="formulaire_erreurs">

        </div>
        <div id="boutonEnvoyer" class="div_centre">
          <button type="submit">Envoyer</button>
        </div>
        <div id="boutonRetour" class="div_centre" style="display:none">
          <button onclick="window.location.href='/';">Retour à l'accueil</button>
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
<script src="/js/gestion_avis.js"></script>
</body>

</html>