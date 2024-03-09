<!DOCTYPE html>
<html lang="fr">
<!-- <FieldSet>
<FORM action="VerifId.php" method=POST>
<Legend>  Identification</Legend>
<INPUT Type=Test Name="Login"  placeholder="Login"   required>
<INPUT Type=Test Name="Password" placeholder="Passord" required>
<INPUT Type=SUBMIT Value="Log !">
</FORM>
</FieldSet> -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
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
include $_SERVER['DOCUMENT_ROOT'] . '/html/header.html';
?>

    <main>
        <h1> Un service de carrosserie de premier ordre </h1>
        <section>
            <div class="container_droite">
                <div class="texte-block">
                    <P>Bienvenue chez notre service carrossier peintre automobile expert,
                        un nom synonyme de qualité et d’expertise dans le domaine de la carrosserie.</p>
                    <p>Ouverts depuis 3 ans, nous vous proposons une large gamme de services personnalisés et de qualité:</p>

                    <div class="liste_a_puces">
                        <ul>
                            <li> réparation de votre carrosserie</li>
                            <li> réparation de la mécanique voiture</li>
                            <li> entretien régulier de votre véhicule gage de performance et sécurité</li>
                            <li> contrôles techniques</li>
                            <li>vente de véhicules d'occasion</li>
                        </ul>

                    </div>
                </div>
                <div class="cadre_img">
                        <img class="texte_img" src="/assets/photo voiture à vendre/cleaning-1837331_640.jpg" alt="bras d'un garagiste qui s'occupe de la carrosserie d'une voiture">
                </div>
            </div>
        </section>
        <section>
            <div class="container_gauche">
                <div class="texte-block">
                    <p>Notre équipe de carrossiers passionnés possède une connaissance approfondie de tous les types de véhicules,
                        assurant ainsi une réparation de première classe pour votre voiture. </p>
                    <div class="prestations">
                        <ul>
                            <li> Du léger enfoncement à la restructuration de l'auto sur marbre</li>
                            <li> De la rayure à la peinture complète</li>
                            <li> Du léger enfoncement à la restructuration de l'auto sur marbre</li>
                            <li> De la réparation au remplacement</li>
                        </ul>
                    </div>
                </div>      
                <div class="cadre_img">
                    <img class="texte_img" src="/assets/photo voiture à vendre/crashed-car-2727666_640.jpg" alt="voiture accidentée à l'avant">
                </div>
            </div>
        </section>
        <section>
            <div class="container_droite">
                <div class="texte-block">
                    <p> Nous prenons en charge toutes les marques de véhicules et offrons des prestations d’entretien et de la
                        mécanique auto et de rénovation.</p>
                    <p>De plus, nous proposons également une location de voitures de courtoisie pour minimiser les perturbations
                        pendant les périodes d’entretien. Choisissez notre service pour une expérience professionnelle hors pair
                        dans le domaine de la carrosserie</p>
                    <p>Nous fournissons une garantie complète sur toutes nos réparations d’automobiles pour vous donner une
                        tranquillité d’esprit totale. Que ce soit une occasion spéciale ou un entretien régulier, notre numéro est
                        toujours prêt à prendre votre appel.</p>
                    <p> Envie de changer de voiture: notre garage vous propose des voitures d'occasion entiérement contrôlés avant
                        la vente, gage de notre sérieux et de nos prestations de qualité</p>
                </div>
                <div class="cadre_img">
                    <img class="texte_img" src="/assets/photo voiture à vendre/ai-generated-8367769_640.jpg" alt=" homme qui se penche sur une voiture ancienne">
                </div>
            </div>
        </section>
        <section>
            <p> Prenez contact par téléphone ou via notre formulaire pour un devis, une voiture qui vous interesse ou un
                tarif</p>
            <div class=" div_center">
                <a href="/php/formulaires_de_contact.php">
                    <button>Cliquez ici</button>
                </a>
            </div>
        </section>
    
        <section>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/equipe.html';
?>
        </section>
        <hr>
    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
</body>

</html>