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
    <link rel="stylesheet" href="/node_modules/nouislider/dist/nouislider.css" >
    <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
    <link href="/css/slider.css" rel="stylesheet" type="text/css" />
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
include($_SERVER['DOCUMENT_ROOT'] . '/php/commons/header_authent.php');
?>
    <main>
        <H1> Nos offres de véhicules d'occasion du moment :</H1>
        <div>
            <form method="post" class="barre_filtre">
                <div class="element_barre">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z" />
                    </svg>
                </div>
                <div class="element_barre">
                    <div class="div_centre">
                        <label for="marque"> Marque : </label>
                    </div>
                    <div class="div_centre">
                       <select id="type_marque">
<?php
try {
    echo '<option value="0">Toutes marques</option>';
    $i = 1;
    // Alimentation de la combo des modèles de voiture disponible.
    foreach ($pdo->query('SELECT DISTINCT(MARQUE) FROM VEHICULE ORDER BY MARQUE ASC', PDO::FETCH_ASSOC) as $modeles) {
        echo '<option value="'.$i.'">'.$modeles['MARQUE'].'</option>';
        $i++;
    }
} catch (PDOException $e) {

}
?>                    
                        </select>
                    </div>
                </div>
                <div class="element_barre">
                    <div class="div_centre">
                        <label for="energie"> Energie : </label>
                    </div>
                    <div class="div_centre">    
                        <select id="type_energie">
<?php
try {
    echo '<option value="0">Toutes motorisations</option>';
    $i = 1;
    // On récupère les motorisations présentes dans la table
    foreach ($pdo->query('SELECT DISTINCT(MOTORISATION) FROM VEHICULE ORDER BY MOTORISATION ASC', PDO::FETCH_ASSOC) as $motorisations) {
        echo '<option value="'.$i.'">'.$motorisations['MOTORISATION'].'</option>';
        $i++;
    }
} catch (PDOException $e) {

}
?> 
                        </select>
                    </div>
                </div>
                <div class="element_barre">
                    <div class="div_centre">
                        <label for="nbPortes"> Nombre de portes : </label>
                    </div>
                    <div class="div_centre">
                        <select id="type_nbPortes">
<?php
try {
    echo '<option value="0">Tous types</option>';
    // On récupère les nombre de portes présentes dans la table
    foreach ($pdo->query('SELECT DISTINCT(NOMBRE_DE_PORTES) FROM VEHICULE ORDER BY NOMBRE_DE_PORTES ASC', PDO::FETCH_ASSOC) as $nbPortes) {
        echo '<option value="'.$nbPortes['NOMBRE_DE_PORTES'].'">'.$nbPortes['NOMBRE_DE_PORTES'].' portes</option>';
    }
} catch (PDOException $e) {

}
?>                     
                        </select>
                    </div>
                </div>
                <div class="element_barre">
                    <div class="div_centre">
                        <label for="prix"> Prix : </label>
                    </div>
                    <div class="div_centre div_slider">
                        <div id="slider-prix" class="slider_filtre"></div>
                    </div>
                    <div class="div_centre">
                        De
                        <input id="prix-min" value="5000" class="input_slider"></input> 
                        à
                        <input id="prix-max" value="500000" class="input_slider"></input>
                    </div>
                </div>
                <div class="element_barre">
                    <div class="div_centre">
                        <label for="kilometre"> Kilométrage : </label>
                    </div>
                    <div class="div_centre div_slider">
                        <div id="slider-kilometre" class="slider_filtre"></div>
                    </div>
                    <div class="div_centre">
                        De :
                        <input id="kilometre-min" value="0" class="input_slider"></input>
                        à
                        <input id="kilometre-max" value="200000" class="input_slider"></input>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <hr />
<main>
    <h1>Gérer les annonces des véhicules</h1>
        <nav class="listing" id="liste_cartes">
        </nav>
        <hr />
    <!-- <form id="personnel_form" name="personnel_form" method="post">
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
        <div id="boutonCreerSalarie" class="div_centre">
          <button type="submit">Créer le salarié</button>
        </div>
      </fieldset>
    </form> -->
</main>
<hr />
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<script src="/node_modules/nouislider/dist/nouislider.js"></script>
<script src="/node_modules/wnumb/wNumb.min.js"></script>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
<?php
try {
    echo '<script>';
    echo 'const vehicules = [';
    $premierElem = true;
    // On récupère les véhicules présents dans la table et on alimente le javascript pour permettre de filtrer
    foreach ($pdo->query('SELECT * FROM VEHICULE', PDO::FETCH_ASSOC) as $vehicule) {
        if ($premierElem) {
            $premierElem = false;
        } else {
            echo ',';
        }
        echo '{marque: "'.$vehicule['MARQUE'].'", modele: "'.$vehicule['MODELE'].'",';
        echo ' urlMiniature: "'.$vehicule['URLMINIATURE'].'", kilometrage: "'.$vehicule['KILOMETRAGE'].'",';
        echo ' motorisation: "'.$vehicule['MOTORISATION'].'", prix: "'.$vehicule['PRIX'].'",';
        echo ' nbPortes: "'.$vehicule['NOMBRE_DE_PORTES'].'",';
        echo ' miseEnAvant1: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT1']).'",';
        echo ' miseEnAvant2: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT2']).'",';
        echo ' miseEnAvant3: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT3']).'",';
        echo ' miseEnAvant4: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT4']).'",';
        echo ' miseEnAvant5: "'.str_replace("\"", "\\\"", $vehicule['MISE_EN_AVANT5']).'",';
        echo 'annee: "'.$vehicule['ANNEE'].'", identifiant: "'.$vehicule['IDENTIFIANT'].'"}';
    }
    echo '];';
    echo '</script>';
} catch (PDOException $e) {

}
?>
<script src="/js/recherche_vehicule.js"></script>
</body>

</html>