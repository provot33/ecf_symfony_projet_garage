<!DOCTYPE html>
<html lang="fr">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Contacter le garage</title>
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
    <h1>Pour toute demande, veuillez nous contacter via notre formulaire de contact :</h1>
    <form id="contact_form" name="contact_form" method="post">
      <fieldset>
        <legend>Formulaire de contact</legend>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="nom">Mon nom :</label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input name="nom" id="nom" type="text" placeholder="Dupont.....">
          </div>
        </div>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="prenom">Mon prénom :</label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input name="prenom" id="prenom" type="text" placeholder="José...">
          </div>
        </div>
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="telephone"><i class="bi bi-telephone-fill"></i></label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input name="telephone" id="telephone" type="text" placeholder="06...">
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
        <div class="formulaire_contact div_centre">
          <div class="formulaire_label div_droite">
            <label for="objet_contact">Objet :</label>
          </div>
          <div class="formulaire_champ div_gauche">
            <input type="hidden" name="id_sujet" id="id_sujet" value=""/>
            <select name="objet_contact" id="objet_contact" <?php echo(isset($_GET['vehicule'])) ? "disabled" : "";?> >
<?php
try {
    $i = 0;
    // Alimentation de la combo des sujets de contact.
    foreach ($pdo->query('SELECT IDENTIFIANT, LIBELLE_SUJET FROM SUJET_CONTACT WHERE IDENTIFIANT < 2000000 ORDER BY LIBELLE_SUJET ASC', PDO::FETCH_ASSOC) as $sujet) {
        echo '<option value="'.$sujet['IDENTIFIANT'].'"' . ((isset($_GET['vehicule']) && $sujet['IDENTIFIANT'] == 1) ? 'selected=""' : '') . '>'.$sujet['LIBELLE_SUJET'].'</option>';
        $i++;
    }
    echo '<option disabled>──────────────────</option>';
    echo '<option value="2000000">Autre</option>';
} catch (PDOException $e) {

}
?>
            </select>
          </div>
        </div>
<?php
if (isset($_GET['vehicule'])) {
  echo '<div class="formulaire_contact div_centre">';
  echo '<div class="formulaire_label div_droite">';
  echo '<label for="reference">Référence Annonce : </label>';
  echo '</div>';
  echo '<input name="reference" id="refvehicule" type="hidden" value="'.$_GET['vehicule'].'">';
  echo '<div class="formulaire_champ div_gauche">';
  echo '<label for="reference">REF_'.sprintf("%06d", $_GET['vehicule']).'</label>';
  echo '</div>';
  echo '</div>';
}
?>
        <div class="formulaire_contact div_centre">
          <textarea name="message" id="message" rows="10" , cols="34" placeholder="Mon message :"></textarea>
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
    <hr />
  </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
<script src="/js/gestion_form.js"></script>
</body>

</html>