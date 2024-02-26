<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);

$sql = "UPDATE COMMENTAIRES
SET TEXTE_COMMENTAIRE='".htmlspecialchars($_POST['avis'])."',
EST_VALIDE = true
WHERE IDENTIFIANT=".$_POST['id'];

if ($pdo->query($sql, PDO::FETCH_ASSOC)) {
    // Le traitement est un succès
    http_response_code(200);
}
?>