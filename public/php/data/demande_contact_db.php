<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);
$sql = "INSERT INTO FORMULAIRE_CONTACT 
(NOM_AUTEUR, PRENOM_AUTEUR, COURRIEL_AUTEUR, TELEPHONE_AUTEUR, ID_SUJET, TEXTE_FORMULAIRE)
VALUES ('".htmlspecialchars($_POST['nom'])."', '".htmlspecialchars($_POST['prenom'])."', '"
.htmlspecialchars($_POST['email'])."', '".htmlspecialchars($_POST['telephone'])."', "
.$_POST['objet_contact'].", '".htmlspecialchars($_POST['message'])."')";

if ($pdo->query($sql, PDO::FETCH_ASSOC)) {
    // Le traitement est un succès
    http_response_code(200);
}
?>