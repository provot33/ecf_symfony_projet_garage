<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);
$sql = "INSERT INTO COMMENTAIRES 
(NOM_AUTEUR_COMMENTAIRE, PRENOM_AUTEUR_COMMENTAIRE, COURRIEL_AUTEUR, NIVEAU_SATISFACTION, TEXTE_COMMENTAIRE)
VALUES ('".htmlspecialchars($_POST['nom'])."', '".htmlspecialchars($_POST['prenom'])."', '"
.htmlspecialchars($_POST['email'])."', ".$_POST['feedback'].", '"
.htmlspecialchars($_POST['message'])."')";

//echo $sql."<br/><br/>";
//$result = $pdo->query($sql, PDO::FETCH_ASSOC);
//echo $result;
//echo "<br/<br/>";
//echo $result->rowCount();
//echo "<br/<br/>";

if ($pdo->query($sql, PDO::FETCH_ASSOC)) {
    // Le traitement est un succès
    http_response_code(200);
}
?>