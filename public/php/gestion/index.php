<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/verification_session.php';
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
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/header_authent.php';
?>
    <h1>VOUS ETES GESTIONNAIRE DU SITE</h1>
    <main>
        <h1> Un service de carrosserie de premier ordre </h1>
<?php
    if ($ligneUser['EST_ADMINISTRATEUR']){        
        echo '<section id="section1" data-tiny-editor>';
    }else {
        echo '<section id="section1">';
    }
    echo $pdo->query('SELECT ZONE_SITE1 FROM CONTENU_SITE WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC)->fetch()['ZONE_SITE1'];
?>            
        </section>
<?php
    if ($ligneUser['EST_ADMINISTRATEUR']){        
        echo '<div class="bouton_table">';
        echo '<input id="cancelSection1" type="button" value="Annuler" />';
        echo '<input id="updateSection1" type="button" value="Enregistrer" />';
        echo '</div>';        
        echo '<section id="section2" data-tiny-editor>';
    }else {
        echo '<section id="section2">';
    }
    echo $pdo->query('SELECT ZONE_SITE2 FROM CONTENU_SITE WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC)->fetch()['ZONE_SITE2'];
?>            
        </section>
<?php
    if ($ligneUser['EST_ADMINISTRATEUR']){        
        echo '<div class="bouton_table">';
        echo '<input id="cancelSection2" type="button" value="Annuler" />';
        echo '<input id="updateSection2" type="button" value="Enregistrer" />';
        echo '</div>';        
        echo '<section id="section3" data-tiny-editor>';
    }else {
        echo '<section id="section3">';
    }
    echo $pdo->query('SELECT ZONE_SITE3 FROM CONTENU_SITE WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC)->fetch()['ZONE_SITE3'];
?>            
        </section>
<?php
    if ($ligneUser['EST_ADMINISTRATEUR']){        
        echo '<div class="bouton_table">';
        echo '<input id="cancelSection3" type="button" value="Annuler" />';
        echo '<input id="updateSection3" type="button" value="Enregistrer" />';
        echo '</div>';
    }
?>
        <section>
            <p> Prenez contact par téléphone ou via notre formulaire pour un devis, une voiture qui vous interesse ou un
                tarif</p>
            <div class=" div_centre">
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
<script src="https://unpkg.com/tiny-editor/dist/bundle.js"></script>
<script src="/js/gestion_contenu.js"></script>
</body>

</html>