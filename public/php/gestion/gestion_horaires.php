<!DOCTYPE html>
<html lang="fr">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
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
        <form method="post">
            <fieldset>
                <legend>Gestion horaires d'ouverture du garage</legend>

                <div>
                    <label for="Jour de la semaine"> Jour de la semaine</label>
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
                <div>
                    <label for="Heures"> Heures matin</label>
                    <select>
                        <option value="8">8h00</option>
                        <option value="9hoo">9h00</option>
                        <option value="10H00">10h00</option>H
                        <option value="11H00">11h00</option>
                        <option value="12H00">12h00</option>
                        <option value="13H00">13h00</option>
                    </select>
                </div>
                <div>
                    <label for="Heures"> Heures matin</label>
                    <select>
                        <option value="8hoo">8h00</option>
                        <option value="9hoo">9h00</option>
                        <option value="10H00">10h00</option>
                        <option value="11H00">11h00</option>
                        <option value="12H00">12h00</option>
                        <option value="13H00">13h00</option>
                    </select>
                </div>
                <div>
                    <label for="Heures"> Heures aprés-midi</label>
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
                <div>
                    <label for="Heures"> Heures aprés-midi</label>
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
            </fieldset>
        </form>
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

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
<script src="/js/gestion_adresse.js"></script>
</body>

</html>