<!DOCTYPE html>
<html lang="fr">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
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
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/header_authent.php';
?>
    <div>
        <fieldset>
            <legend>Gestion horaires d'ouverture du garage</legend>
            <fieldset>
                <legend>Ajouter une plage horaire</legend>
                <div>
                <h2>Plages Horaires existantes</h2>
                    <table>
<?php
$comboPlageHoraire = array();
try {
    // On récupère les plages horaires présentes dans la table
    foreach ($pdo->query('SELECT IDENTIFIANT, 
        TIME_FORMAT(HEURE_OUVERTURE, \'%H:%i\') AS HEURE_OUVERTURE, 
        TIME_FORMAT(HEURE_FERMETURE, \'%H:%i\') AS HEURE_FERMETURE
        FROM HORAIRE_OUVERTURE ORDER BY HEURE_OUVERTURE ASC', PDO::FETCH_ASSOC) as $plageHoraire) {
        echo '<tr><td>'.$plageHoraire['HEURE_OUVERTURE'].' - '.$plageHoraire['HEURE_FERMETURE'].'</td></tr>';
        $comboPlageHoraire[$plageHoraire['IDENTIFIANT']] = $plageHoraire['HEURE_OUVERTURE'].' - '.$plageHoraire['HEURE_FERMETURE'];
    }


} catch (PDOException $e) {

}
?> 
                    </table>
                    <br/>
                    <form id="plage_horaire_form" name="plage_horaire_form" method="post">
                        <h2>Nouvelle plage horaire</h2>
                        <div>
                            <label>Heure de début</label>
                            <input type="time" id="horaire_debut_plage" name="horaire_debut_plage" >
                        </div>
                        <div>
                            <label>Heure de fin</label>
                            <input type="time" id="horaire_fin_plage" name="horaire_fin_plage" >
                        </div>
                        <div class="formulaire_contact" id="formulaire_erreurs_plage_horaire">

                        </div>
                        <div class="div_center">
                            <button type="submit">Ajouter la plage</button>
                        </div>
                    </form>
                </div>
            </fieldset>
            <br />
            <fieldset>
                <legend>Gérer les ouvertures</legend>
                <div>
                    <form id="gestion_horaire_form" name="gestion_horaire_form" method="post">
                        <table id="table_horaires">
                            <thead>
                                <tr>
                                    <td style="display:none;">Id</td>
                                    <td>Jour</td>
                                    <td>Est Ouvert</td>
                                    <td>Plage Horaire 1</td>
                                    <td>Plage Horaire 2</td>
                                </tr>
                            </thead>
                            <tbody>
<?php


try {

    $tableau = array();
    $i = 0;
    $jourCourant = 'Hier';

    // On récupère les horaires de la semaine et on les formatte pour les afficher dans la table prévue.
    foreach ($pdo->query('SELECT JOUR_OUVERTURE.IDENTIFIANT AS IDENTIFIANT, NOM_JOUR, 
        OUVERT, HORAIRE_OUVERTURE.IDENTIFIANT AS HEURE_ID
        FROM JOUR_OUVERTURE LEFT OUTER JOIN JOUR_HORAIRE ON JOUR_HORAIRE.ID_JOUR = JOUR_OUVERTURE.IDENTIFIANT
        LEFT OUTER JOIN HORAIRE_OUVERTURE ON JOUR_HORAIRE.ID_HORAIRE = HORAIRE_OUVERTURE.IDENTIFIANT
        ORDER BY POSITION_JOUR ASC, HEURE_OUVERTURE ASC', PDO::FETCH_ASSOC) as $horaires) {

        if ($jourCourant !== $horaires['NOM_JOUR']){
            $tableau[$i] = array();
            $tableau[$i]['IDENTIFIANT'] = $horaires['IDENTIFIANT'];
            $tableau[$i]['NOM_JOUR'] = $horaires['NOM_JOUR'];
            $tableau[$i]['OUVERT'] = $horaires['OUVERT'];
            $tableau[$i]['PLAGE_1'] = $horaires['HEURE_ID'];
            $jourCourant = $horaires['NOM_JOUR'];
            $i++;
        } else {
            $i--;
            $tableau[$i]['PLAGE_2'] = $horaires['HEURE_ID'];
            $i++;
        }
    }
        
    // Mise en forme HTML des résultats.
    foreach ($tableau as $ligne){ 
        echo '<tr>';
        echo' <td style="display:none;">'.$ligne['IDENTIFIANT'].'</td>';
        echo '<td>'.$ligne['NOM_JOUR'].'</td>';
        echo '<td><input type="checkbox" id="est_ouvert" name="est_ouvert" '.($ligne['OUVERT']? 'checked' : '').'></td>';
        echo '<td>'.arrayToSelect($comboPlageHoraire, $selected = $ligne['PLAGE_1']).'</td>';
        echo '<td>'.arrayToSelect($comboPlageHoraire, $selected = (isset($ligne['PLAGE_2']) ? $ligne['PLAGE_2'] : 0)).'</td>';
        echo '</tr>';
    }


        // // On récupère les plages horaires présentes dans la table
        // foreach ($pdo->query('SELECT JOUR_OUVERTURE.IDENTIFIANT AS IDENTIFIANT,
        // NOM_JOUR, OUVERT, HORAIRE_OUVERTURE.IDENTIFIANT AS HEURE_ID
        // FROM JOUR_OUVERTURE LEFT OUTER JOIN JOUR_HORAIRE ON JOUR_HORAIRE.ID_JOUR = JOUR_OUVERTURE.IDENTIFIANT
        // LEFT OUTER JOIN HORAIRE_OUVERTURE ON JOUR_HORAIRE.ID_HORAIRE = HORAIRE_OUVERTURE.IDENTIFIANT
        // ORDER BY POSITION_JOUR ASC, HEURE_OUVERTURE ASC', PDO::FETCH_ASSOC) as $horaire) {


        //     echo '<tr>';
        //     echo '<td>'.$horaire['NOM_JOUR'].'</td>'.
        //         '<td><input type="checkbox" id="est_ouvert" name="est_ouvert" '.($horaire['OUVERT']? 'checked' : '').'></td>';
        //     echo '<td>'.arrayToSelect($comboPlageHoraire, $selected = $horaire['HEURE_ID']);
        //     echo '</td></tr>';
        // }

} catch (PDOException $e) {

}
?> 
                            </tbody>
                        </table>
                        <div class="formulaire_contact" id="formulaire_erreurs_horaire">

                        </div>
                        <div class="div_center">
                            <button type="submit">Valider les horaires</button>
                        </div>
                    </form>
                </div>                
            </fieldset>
        </fieldset>
        <div>
            <hr />
        </div>
        <form id="adresse_form" name="adresse_form" method="post">
            <fieldset>
                <legend>Modification des coordonnées</legend>
<?php
// Récupération des coordonnées du garage depuis la base de données.
try {
    $sth = $pdo->prepare('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1');
    $sth->execute();
    $coordonnees = $sth->fetch();
    //$coordonnees = $pdo->fetch('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC);

    echo '<div><label for="adresse_rue1">Adresse ligne 1 :</label>' .
        '<input type="text" id="adresse_rue1" name="adresse_rue1" value="' .
        $coordonnees['ADRESSE_RUE1'] . '"></div>';
    echo '<div><label for="adresse_rue2">Adresse ligne 2 :</label>' .
        '<input type="text" id="adresse_rue2" name="adresse_rue2" value="' .
        $coordonnees['ADRESSE_RUE2'] . '"></div>';
    echo '<div><label for="code_postal">Code Postal :</label>' .
        '<input type="text" id="code_postal" name="code_postal" value="' .
        $coordonnees['CODE_POSTAL'] . '"></div>';
    echo '<div><label for="ville">Ville :</label>' .
        '<input type="text" id="ville" name="ville" value="' .
        $coordonnees['VILLE'] . '"></div>';
    echo '<div><label for="telephone">Téléphone :</label>' .
        '<input type="text" id="telephone" name="telephone" value="' .
        $coordonnees['TELEPHONE'] . '"></div>';
} catch (PDOException $e) {

}
?>
                <div class="formulaire_contact" id="formulaire_erreurs_adresse">

                </div>
                <div class="div_center">
                    <button type="submit">Valider l'adresse</button>
                </div>
            </fieldset>
        </form method="post">
    </div>
    <br/>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
<script src="/js/gestion_horaires.js"></script>
<script src="/js/gestion_adresse.js"></script>
</body>

</html>