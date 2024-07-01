<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/tools.php';
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
  <form id="creation_salarie_form" name="creation_salarie_form" method="post">
    <fieldset>
      <legend>Gestion des Véhicules</legend>

      <h1>Véhicules enregistrées dans le garage</h1>
      <div class="formulaire_contact div_centre message_erreur" id="formulaire_erreurs">

      </div>
      <div>
        <table id="vehicule-list" class="table_data">
          <thead class="thead_data">
            <tr class="tr_data">
              <th style="display:none;" class="th_data">Id Table (PK)</th>
              <th style="display:none;" class="th_data">ReferenceMarque</th><th class="th_data">Marque</th>
              <th style="display:none;" class="th_data">ReferenceModele</th><th class="th_data">Modèle</th>
              <th style="display:none;" class="th_data">ReferenceAnnee</th><th class="th_data" style="width:5%">Année</th>
              <th style="display:none;" class="th_data">ReferenceUrl</th><th class="th_data" style="width:20%">URL Image</th>
              <th style="display:none;" class="th_data">ReferenceKilometrage</th><th class="th_data" style="width:6%">Nb Km</th>
              <th style="display:none;" class="th_data">ReferenceMotorisation</th><th class="th_data" style="width:8%">Energie</th>
              <th style="display:none;" class="th_data">ReferencePrix</th><th class="th_data" style="width:10%">Prix</th>
              <th style="display:none;" class="th_data">ReferenceNbPortes</th><th class="th_data" style="width:5%">Nb Portes</th>
              <th style="display:none;" class="th_data">ReferenceNbPortes</th><th class="th_data">Mise en avant 1</th>
              <th style="display:none;" class="th_data">ReferenceNbPortes</th><th class="th_data">Mise en avant 2</th>
              <th style="display:none;" class="th_data">ReferenceNbPortes</th><th class="th_data">Mise en avant 3</th>
              <th class="th_data" style="width:5%">Détail</th>
              <th class="th_data" style="width:5%">Suppr ?</th>
            </tr>
          </thead>
  
<?php
// On récupère les personnes dans la table et on met en page pour permettre le traitement
$index=0;
foreach ($pdo->query('SELECT * FROM VEHICULE', PDO::FETCH_ASSOC) as $vehicule) {
echo '<tr>';

echo '<td style="display:none;" class="td_data">' . $vehicule['IDENTIFIANT'] . '</td>';
echo '<td style="display:none;" class="td_data">' . $vehicule['MARQUE'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeMarque_'.$index.'" name="vehiculeMarque_'.$index.'" value="' . $vehicule['MARQUE'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['MODELE'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeModele_'.$index.'" name="vehiculeModele_'.$index.'" value="' . $vehicule['MODELE'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['ANNEE'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeAnnee_'.$index.'" name="vehiculeAnnee_'.$index.'" value="' . $vehicule['ANNEE'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['URLMINIATURE'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeUrl_'.$index.'" name="vehiculeUrl_'.$index.'" value="' . $vehicule['URLMINIATURE'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['KILOMETRAGE'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeKm_'.$index.'" name="vehiculeKm_'.$index.'" value="' . $vehicule['KILOMETRAGE'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['MOTORISATION'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeMotorisation_'.$index.'" name="vehiculeMotorisation_'.$index.'" value="' . $vehicule['MOTORISATION'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['PRIX'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculePrix_'.$index.'" name="vehiculePrix_'.$index.'" value="' . $vehicule['PRIX'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['NOMBRE_DE_PORTES'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculePorte_'.$index.'" name="vehiculePorte_'.$index.'" value="' . $vehicule['NOMBRE_DE_PORTES'] . '" /></td>';

echo '<td style="display:none;" class="td_data">' . $vehicule['MISE_EN_AVANT1'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeMiseEnAvant1_'.$index.'" name="vehiculeMiseEnAvant1_'.$index.'" value="' . htmlspecialchars($vehicule['MISE_EN_AVANT1']) . '" /></td>';
echo '<td style="display:none;" class="td_data">' . $vehicule['MISE_EN_AVANT2'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeMiseEnAvant2_'.$index.'" name="vehiculeMiseEnAvant2_'.$index.'" value="' . htmlspecialchars($vehicule['MISE_EN_AVANT2']) . '" /></td>';
echo '<td style="display:none;" class="td_data">' . $vehicule['MISE_EN_AVANT3'] . '</td>';
echo '<td class="td_data"><input type="text" id="vehiculeMiseEnAvant3_'.$index.'" name="vehiculeMiseEnAvant3_'.$index.'" value="' . htmlspecialchars($vehicule['MISE_EN_AVANT3']) . '" /></td>';

echo '<td class="td_data"><a href="gotodetail.php">&nbsp;+&nbsp;</a></td>';
echo '<td class="td_data"><input type="checkbox" id="vehiculeSuppr_'.$index.'" name="vehiculeSuppr_'.$index.'" /></td>';
        
echo '</tr>';
$index++;
}

?>

        </table>
      </div>
      <br />
      <div class="bouton_table">
        <input id="vehiculeAdd" type="button" value="Ajouter une ligne" />
        <input id="vehiculeUpdate" type="button" value="Valider" />
      </div>
    </fieldset>
  </form>

    <!-- <h1>Gérer les annonces des véhicules</h1> -->
    <!-- <?php
// try {
//     echo '<div>';
//     //echo 'const vehicules = [';
//     $premierElem = true;
//     // On récupère les véhicules présents dans la table
//     foreach ($pdo->query('SELECT * FROM VEHICULE', PDO::FETCH_ASSOC) as $vehicule) {
//         if ($premierElem) {
//             $premierElem = false;
//         } else {
//             echo '<br /><br />';
//         }
//         echo '<div>';
//         echo '<label for="reference">Référence Annonce : </label>';
//         echo '<label for="reference">REF_'.sprintf("%06d", $vehicule['IDENTIFIANT']).'</label>';
//         echo '</div>';

//         echo '{marque: "'.$vehicule['MARQUE'].'", modele: "'.$vehicule['MODELE'].'",';
//         echo ' urlMiniature: "'.$vehicule['URLMINIATURE'].'", kilometrage: "'.$vehicule['KILOMETRAGE'].'",';
//         echo ' motorisation: "'.$vehicule['MOTORISATION'].'", prix: "'.$vehicule['PRIX'].'",';
//         echo ' nbPortes: "'.$vehicule['NOMBRE_DE_PORTES'].'",';
//         echo ' miseEnAvant1: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT1']).'",';
//         echo ' miseEnAvant2: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT2']).'",';
//         echo ' miseEnAvant3: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT3']).'",';
//         echo ' miseEnAvant4: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT4']).'",';
//         echo ' miseEnAvant5: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT5']).'",';
//         echo 'annee: "'.$vehicule['ANNEE'].'", identifiant: "'.$vehicule['IDENTIFIANT'].'"}';
//     }
//     //echo '];';
//     echo '</div>';
// } catch (PDOException $e) {

// }
?> -->

</main>
<hr />
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
<script src="/js/gestion_vehicule.js"></script>
</body>

</html>