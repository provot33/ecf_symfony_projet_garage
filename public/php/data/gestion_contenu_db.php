<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
try {
    // $contenuPost = "";
    $nomZone = "";
    if (isset($_GET['section']) && !empty($_GET['section'])) {
        switch($_GET['section']) {
            case 'section1' : 
                $nomZone = "ZONE_SITE1";
                break;
            case 'section2' : 
                $nomZone = "ZONE_SITE2";
                break;
            case 'section3' : 
                $nomZone = "ZONE_SITE3";
                break;
        }
        $query = $pdo->prepare(
            "SELECT " . $nomZone . " FROM CONTENU_SITE WHERE IDENTIFIANT = 1");               

        $query->execute();
        echo json_encode($query->fetch()[$nomZone]);
    }
    if (isset($_POST['section1']) && !empty($_POST['section1'])) {
        $query = $pdo->prepare(
            "UPDATE CONTENU_SITE
                    SET ZONE_SITE1 = :section1
                    WHERE IDENTIFIANT = 1");

        $query->bindParam(':section1', $_POST['section1'], PDO::PARAM_STR);
        $query->execute();
    }
    if (isset($_POST['section2']) && !empty($_POST['section2'])) {
        $query = $pdo->prepare(
            "UPDATE CONTENU_SITE
                    SET ZONE_SITE2 = :section2
                    WHERE IDENTIFIANT = 1");

        $query->bindParam(':section2', $_POST['section2'], PDO::PARAM_STR);
        $query->execute();
    }
    if (isset($_POST['section3']) && !empty($_POST['section3'])) {
        $query = $pdo->prepare(
            "UPDATE CONTENU_SITE
                    SET ZONE_SITE3 = :section3
                    WHERE IDENTIFIANT = 1");

        $query->bindParam(':section3', $_POST['section3'], PDO::PARAM_STR);
        $query->execute();
    }

    http_response_code(200);
    // echo $contenuPost;
    // throw new \Exception("Effet Traitement : ".$contenuPost);
} catch (\Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}
