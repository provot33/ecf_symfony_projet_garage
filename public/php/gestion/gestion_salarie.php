<!DOCTYPE html>
<html lang="fr">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_roles.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/tools.php';
?>

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
include($_SERVER['DOCUMENT_ROOT'] . '/php/commons//header_authent.php');
?>

    <form id="creation_salarie_form" name="creation_salarie_form" method="post">
      <fieldset>
        <legend>Gestion des Salariés</legend>

        <h1>Salariés du Garage</h1>
        <div class="formulaire_contact div_centre message_erreur" id="formulaire_erreurs">

        </div>
        <div>
          <table id="personnel-list" class="table_data">
            <thead class="thead_data">
              <tr class="tr_data">
                <th style="display:none;" class="th_data">Id Table (PK)</th>
                <th style="display:none;" class="th_data">ReferenceNom</th><th class="th_data">Nom</th>
                <th style="display:none;" class="th_data">ReferencePrenom</th><th class="th_data">Prénom</th>
                <th style="display:none;" class="th_data">ReferenceCourriel</th><th class="th_data" style="width:30%">Adresse courriel</th>
                <th style="display:none;" class="th_data">ReferencePassword</th><th class="th_data">Mot de Passe</th>
                <th style="display:none;" class="th_data">ReferenceAdmin</th><th class="th_data" style="width:10%">Admin du site ?</th>
                <th class="th_data" style="width:10%">Supprimer ?</th>
              </tr>
            </thead>
   
<?php
// On récupère les personnes dans la table et on met en page pour permettre le traitement
$index=0;
foreach ($pdo->query('SELECT * FROM PERSONNEL', PDO::FETCH_ASSOC) as $personnel) {
  echo '<tr>';

  echo '<td style="display:none;" class="td_data">' . $personnel['IDENTIFIANT'] . '</td>';
  echo '<td style="display:none;" class="td_data">' . $personnel['NOM'] . '</td>';
  echo '<td class="td_data"><input type="text" id="personnelName_'.$index.'" name="personnelName_'.$index.'" value="' . $personnel['NOM'] . '" /></td>';

  echo '<td style="display:none;" class="td_data">' . $personnel['PRENOM'] . '</td>';
  echo '<td class="td_data"><input type="text" id="personnelFirstname_'.$index.'" name="personnelFirstname_'.$index.'" value="' . $personnel['PRENOM'] . '" /></td>';

  echo '<td style="display:none;" class="td_data">' . $personnel['ADRESSE_COURRIEL'] . '</td>';
  echo '<td class="td_data"><input type="text" id="personnelEmail_'.$index.'" name="personnelEmail_'.$index.'" value="' . $personnel['ADRESSE_COURRIEL'] . '" /></td>';

  echo '<td style="display:none;" class="td_data"></td>';
  echo '<td class="td_data"><input type="text" id="personnelPwd_'.$index.'" name="personnelPwd_'.$index.'" value="" /></td>';

  echo '<td style="display:none;" class="td_data"><input type="checkbox"' . ($personnel['EST_ADMINISTRATEUR']?'checked=""':'') . '/></td>';
  echo '<td class="td_data"><input type="checkbox" id="personnelAdmin_'.$index.'" name="personnelAdmin_'.$index.'" ' . ($personnel['EST_ADMINISTRATEUR']?'checked=""':'') . '/></td>';

  echo '<td class="td_data"><input type="checkbox" id="personnelSuppr_'.$index.'" name="personnelSuppr_'.$index.'" /></td>';
          
  echo '</tr>';
  $index++;
}
 
?>

          </table>
        </div>
        <br />
        <div class="bouton_table">
          <input id="personnelAdd" type="button" value="Ajouter une ligne" />
          <input id="personnelUpdate" type="button" value="Valider" />
        </div>
      </fieldset>
    </form>



        <!-- <div id="boutonEnvoyer" class="div_centre">
          <button type="submit">Créer le salarié</button>
        </div> -->
        <!-- <div id="boutonRetour" class="div_centre" style="display:none">
          <button onclick="window.location.href='/';">Retour à l'accueil</button>
        </div> -->
      </fieldset>
</form>

<hr />
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
<script src="/js/gestion_salarie.js"></script>
</body>

</html>