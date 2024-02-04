<!DOCTYPE html>
<html lang="fr">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descriptif du vehicule</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link href="/css/slideshow.css" rel="stylesheet" type="text/css" />
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
        <!-- Slideshow container -->
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
<?php
$nbPhotos = 0;
try {
    $i = 1;
    $results = $pdo->query("SELECT URL_VISUEL FROM VISUEL_VEHICULE WHERE IDENTIFIANT_VEHICULE = {$_GET['vehicule']}", PDO::FETCH_ASSOC); 
    $nbPhotos = $results->rowCount();
    foreach ($results as $visuel) {
        echo '<div class="mySlides fade"><div class="numbertext">';
        echo $i.' / '.$nbPhotos.'</div><img class="photo" src="';
        echo $visuel['URL_VISUEL'].'" /></div>';
        $i++;
    }
} catch (PDOException $e) {

}
?>            
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div class="div_center">
<?php 
    echo '<span class="dot dot-actif" onclick="currentSlide(1)"></span>';
    for ($i = 2; $i <= $nbPhotos; $i++ ){
        echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
    }
?>
        </div>

        <div class="div_center div_pane">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" onclick="openInfo(event, 'general')">Général</button >
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openInfo(event, 'moteur')">Moteur</button >
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openInfo(event, 'equipement')">Equipement</button >
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active" id="general" role="tabpanel" aria-labelledby="general" tabindex="0">
                    <div>Marque :</div>
                    <div>Modèle :</div>
                    <div>Couleur :</div>
                    <div>Année :</div>
                    <div>Kilométrage :</div>
                    <div>Portes :</div>
                    <div>Places :</div>
                </div>
                <div class="tab-pane fade" id="moteur" role="tabpanel" aria-labelledby="moteur" tabindex="1">
                    <div>Motorisation :</div>
                    <div>Puissance :</div>
                    <div>Révision effectué :</div>
                    <div>Carnet d'entretien :</div>
                </div>
                <div class="tab-pane fade" id="equipement" role="tabpanel" aria-labelledby="equipement" tabindex="2">
                    <div>ABS</div>
                    <div>Anti-patinage</div>
                    <div>Climatisation</div>
                    <div>Taille du coffre :</div>
                    <div>Roue de secours :</div>
                </div>
            </div>
        </div>
    </main>
    <hr />
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
    <script src="/js/slideshow.js"></script>
    <script src="/js/tab.js"></script>
    <script src="/node_modules/bootstrap/js/src/tab.js"></script>
</body>

</html>