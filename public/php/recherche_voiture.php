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
                <label for="car"> Marque</label>
                <select>
                    <option value="Renault">Renault</option>
                    <option value="Opel">Opel</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Audi">Audi</option>
                </select>
                <label for="car"> Energie</label>
                <select>
                    <option value="Diesel">Diesel</option>
                    <option value="Electrique">Eléctrique</option>
                    <option value="Essence">Essence</option>
                </select>
                <label for="car"> Nombre de portes</label>
                <select>
                    <option value="2 portes">2 portes</option>
                    <option value="4 portes">4 portes</option>
                </select>
            </form>
            <hr>
        </div>
        <!-- <nav class="listing">
            <img src="/assets/photo voiture à vendre/opel/opel1.jpg" alt="opel noire extérieure arriére">
            <img src="/assets/photo voiture à vendre/PEUGEOT/peugeot3.jpg" alt="peugeot jaune extérieure arriére">
            <img src="/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio4.jpg" alt="clio noire extérieure avant">
            <img src="/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane2.jpg" alt="megane bleue extérieure avant">
            <img src="/assets/photo voiture à vendre/seat/seat1.jpg" alt="seat noire extérieure avant">
            <img src="/assets/photo voiture à vendre/voiture a/audi 1.jpg" alt="audi grise foncée extérieure arriére">
            <img src="/assets/photo voiture à vendre/voiture aa/audi 5.jpg" alt="audi grise claire extérieure arriére">
            <img src="/assets/photo voiture à vendre/voiture bmw/bmw1.jpg" alt="bmw grise claire extérieure avant">
            <img src="/assets/photo voiture à vendre/voiture mercedes/mercedes3.jpg" alt="mercedes blanche extérieure avant">
            <img src="/assets/photo voiture à vendre/voiture mustang/mustang2.jpg" alt="mustang rouge extérieure avant">

        </nav> -->
    </main>

    <main>
        <nav class="listing">
            <!-- Paytacard ! -->
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-content">
                            <h2>OPEL</h2>
                            <img src="/assets/photo voiture à vendre/opel/opel1.jpg" alt="opel noire extérieure arriére">
                            <h2>35 000 km</h2>
                            <h2>Diesel</h2>
                            <h2>30 000 €</h2>
                        </div>
                    </div>
                    <div class="card-back">
                        <h2>Equipements</h2>
                        <p>4 places</p>
                        <p>3 portes</p>
                        <p>Diesel</p>
                        <p>Climatisation</p>
                        <p>2016</p>
                        <a href="/php/detail_vehicule.php?vehicule=opel-1">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-content">
                            <h2>RENAULT</h2>
                            <img src="/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane2.jpg" alt="megane bleue extérieure avant">
                            <h2>65 000 km</h2>
                            <h2>Essence</h2>
                            <h2>41 000 €</h2>
                        </div>
                    </div>
                    <div class="card-back">
                        <h2>Equipements</h2>
                        <p>5 places</p>
                        <p>5 portes</p>
                        <p>Essence</p>
                        <p>Intérieur "Premium"</p>
                        <p>2017</p>
                        <a href="/php/detail_vehicule.php?vehicule=renault-1">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-content">
                            <h2>OPEL</h2>
                            <img src="/assets/photo voiture à vendre/PEUGEOT/peugeot3.jpg" alt="peugeot jaune extérieure arriére">
                            <h2>46 000 km</h2>
                            <h2>Diesel</h2>
                            <h2>27 000 €</h2>
                        </div>
                    </div>
                    <div class="card-back">
                        <h2>Equipements</h2>
                        <p>4 places</p>
                        <p>3 portes</p>
                        <p>Diesel</p>
                        <p>Moteur BiTurbo</p>
                        <p>2019</p>
                        <a href="/php/detail_vehicule.php?vehicule=peugeot-1">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-content">
                            <h2>RENAULT</h2>
                            <img src="/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio4.jpg" alt="clio noire extérieure avant">
                            <h2>12 000 km</h2>
                            <h2>Essence</h2>
                            <h2>19 000 €</h2>
                        </div>
                    </div>
                    <div class="card-back">
                        <h2>Equipements</h2>
                        <p>4 places</p>
                        <p>3 portes</p>
                        <p>Carnet d'entretien</p>
                        <p>Non Fumeur</p>
                        <p>2006</p>
                        <a href="/php/detail_vehicule.php?vehicule=renault-2">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-content">
                            <h2>AUDI</h2>
                            <img src="/assets/photo voiture à vendre/voiture a/audi 1.jpg" alt="audi grise foncée extérieure arriére">
                            <h2>100 000 km</h2>
                            <h2>Essence</h2>
                            <h2>37 000 €</h2>
                        </div>
                    </div>
                    <div class="card-back">
                        <h2>Equipements</h2>
                        <p>5 places</p>
                        <p>5 portes</p>
                        <p>Familliale</p>
                        <p>Carbu Double Corps</p>
                        <p>2016</p>
                        <a href="/php/detail_vehicule.php?vehicule=audi-1">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>
            <!-- / Paytacard ! -->
        </nav>

        <!-- création card-->

        <!-- <div class="card">
            <a href="https://www.gekkode.com/blog/post/#">
                !-- Image à la une --
                <div class="card-image"><img src="/assets/photo voiture à vendre/opel/opel1.jpg" alt="opel noire extérieure arriére">></div>
                !-- Fin de l'image à la une --

                !-- Corp de notre carte --
                <div class="card-body">

                    !-- Date de publication de l'article--
                    <div class="card-date">
                        <time>20 Novembre 1992</time>
                    </div>

                    !-- Titre de l'article --
                    <div class="card-title">
                        <h3>Lorem Ipsum</h3>
                    </div>
                    !-- Extrait de l'article --
                    <div class="card-excerpt">
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam voluptatibus autem consectetur voluptate facere at, omnis ab optio placeat officiis! Animi modi harum enim quia veniam consectetur unde autem inventore.</p>
                    </div>

                </div>
            </a>
        </div> -->
    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
</body>

</html>