<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);

$sql = "INSERT INTO HORAIRE_OUVERTURE 
(HEURE_OUVERTURE, HEURE_FERMETURE)
VALUES ('".$_POST['horaire_debut_plage']."', '".$_POST['horaire_fin_plage']."')";

// echo $sql."<br/><br/>";
// $result = $pdo->query($sql, PDO::FETCH_ASSOC);
// echo $result;
// echo "<br/<br/>";
// echo $result->rowCount();
// echo "<br/<br/>";

if ($pdo->query($sql, PDO::FETCH_ASSOC)) {
    // Le traitement est un succès
    http_response_code(200);
}
?>