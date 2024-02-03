<!DOCTYPE html>
<html lang="fr">

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
    include($_SERVER['DOCUMENT_ROOT'] . '/html/header.html');
    ?>
    <main>
        <!-- Slideshow container -->
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 5</div>
                <img class="photo" src="/assets/photo voiture à vendre/voiture mustang/mustang2.jpg" />
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 5</div>
                <img class="photo" src="/assets/photo voiture à vendre/voiture mustang/mustang1.jpg" />
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 5</div>
                <img class="photo" src="/assets/photo voiture à vendre/voiture mustang/mustang3.jpg" />
            </div>
            <div class="mySlides fade">
                <div class="numbertext">4 / 5</div>
                <img class="photo" src="/assets/photo voiture à vendre/voiture mustang/mustang4.jpg" />
            </div>
            <div class="mySlides fade">
                <div class="numbertext">5 / 5</div>
                <img class="photo" src="/assets/photo voiture à vendre/voiture mustang/mustang5.jpg" />
            </div>
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div class="div_center">
            <span class="dot dot-actif" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
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
    include($_SERVER['DOCUMENT_ROOT'] . '/html/footer.html');
    ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
    ?>
    <script src="/js/slideshow.js"></script>
    <script src="/js/tab.js"></script>
    <script src="/node_modules/bootstrap/js/src/tab.js"></script>
</body>

</html>