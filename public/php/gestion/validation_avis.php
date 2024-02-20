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
    <link href="/css/rating.css" rel="stylesheet" type="text/css" />
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
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/header_authent.php';
?>
    <div>
        <fieldset>
            <legend>Liste des avis à valider</legend>
<?php
try {
    $i = 0;
    // On récupère les avis à valider présents dans la table
    foreach ($pdo->query('SELECT NOM_AUTEUR_COMMENTAIRE, PRENOM_AUTEUR_COMMENTAIRE, 
        COURRIEL_AUTEUR, NIVEAU_SATISFACTION, TEXTE_COMMENTAIRE, EST_VALIDE 
        FROM COMMENTAIRES 
        WHERE EST_VALIDE = false', PDO::FETCH_ASSOC) as $commentaire) {
            echo alimenteCommentaires($i,
                $commentaire['NOM_AUTEUR_COMMENTAIRE'], 
                $commentaire['PRENOM_AUTEUR_COMMENTAIRE'], 
                $commentaire['COURRIEL_AUTEUR'], 
                $commentaire['NIVEAU_SATISFACTION'], 
                $commentaire['TEXTE_COMMENTAIRE'], 
                $commentaire['EST_VALIDE'],
                true);
            $i++;
    }

} catch (PDOException $e) {

}
?>
        </fieldset>
    </div>
    <br/>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/script.html';
?>
</body>

</html>