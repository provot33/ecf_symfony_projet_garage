<!DOCTYPE html>
<html lang="fr">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste de voitures d'occasion à vendre</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
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
include $_SERVER['DOCUMENT_ROOT'] . '/html/header.html';
?>
    <main>
        <H1> Nos offres de véhicules d'occasion du moment:</H1>
        <div>
            <form method="post">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z" />
                </svg>
                <label for="marque"> Marque</label>
                <select>
<?php
try {
    $i = 0;
    // Alimentation de la combo des modèles de voiture disponible.
    foreach ($pdo->query('SELECT DISTINCT(MARQUE) FROM VEHICULE ORDER BY MARQUE ASC', PDO::FETCH_ASSOC) as $modeles) {
        echo '<option value="'.$i.'">'.$modeles['MARQUE'].'</option>';
        $i++;
    }
} catch (PDOException $e) {

}
?>                    
                </select>
                <label for="energie"> Energie</label>
                <select>
<?php
try {
    $i = 0;
    // On récupère les motorisations présentes dans la table
    foreach ($pdo->query('SELECT DISTINCT(MOTORISATION) FROM VEHICULE ORDER BY MOTORISATION ASC', PDO::FETCH_ASSOC) as $motorisations) {
        echo '<option value="'.$i.'">'.$motorisations['MOTORISATION'].'</option>';
        $i++;
    }
} catch (PDOException $e) {

}
?> 
                </select>
                <label for="nbPortes"> Nombre de portes</label>
                <select>
<?php
try {
    $i = 0;
    // On récupère les motorisations présentes dans la table
    foreach ($pdo->query('SELECT DISTINCT(NOMBRE_DE_PORTES) FROM VEHICULE ORDER BY NOMBRE_DE_PORTES ASC', PDO::FETCH_ASSOC) as $nbPortes) {
        echo '<option value="'.$i.'">'.$nbPortes['NOMBRE_DE_PORTES'].' portes</option>';
        $i++;
    }
} catch (PDOException $e) {

}
?>                     
                </select>
            </form>
            <hr>
        </div>
    </main>

    <main>
        <nav class="listing">
<?php
try {
    $i = 0;
    // On récupère les véhicules présents dans la table
    foreach ($pdo->query('SELECT * FROM VEHICULE', PDO::FETCH_ASSOC) as $vehicule) {
        echo '<div class="card"><div class="card-inner"><div class="card-front"><div class="card-content">';
        echo '<h2>'.$vehicule['MARQUE'].' '.$vehicule['MODELE'].'</h2>';
        echo '<img src="'.$vehicule['URLMINIATURE'].'" alt="visuel vehicule">';
        echo '<h2>'.number_format($vehicule['KILOMETRAGE'], 0, ',', ' ').' km</h2>';
        echo '<h2>'.$vehicule['MOTORISATION'].'</h2>';
        echo '<h2>'.number_format($vehicule['PRIX'], 0, ',', ' ').' €</h2>';
        echo '</div></div><div class="card-back"><h2>Equipements</h2>';
        echo '<p>'.$vehicule['MISE_EN_AVANT1'].'</p>';
        echo '<p>'.$vehicule['NOMBRE_DE_PORTES'].' portes</p>';
        echo '<p>'.$vehicule['MISE_EN_AVANT2'].'</p>';
        echo '<p>'.$vehicule['MISE_EN_AVANT3'].'</p>';
        if ($vehicule['MISE_EN_AVANT4'] !== null){
            echo '<p>'.$vehicule['MISE_EN_AVANT4'].'</p>';
        }
        if ($vehicule['MISE_EN_AVANT5'] !== null){
            echo '<p>'.$vehicule['MISE_EN_AVANT5'].'</p>';
        }
        echo '<p>'.$vehicule['ANNEE'].'</p>';
        echo '<a href="/php/detail_vehicule.php?vehicule='.$vehicule['IDENTIFIANT'].'">Plus de détails</a>';
        echo '</div></div></div>';
    }
} catch (PDOException $e) {

}
?> 
        </nav>
    </main>
    <br />
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
</body>

</html>