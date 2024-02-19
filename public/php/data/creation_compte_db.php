<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);
// Encryptage du mot de passe
$requete ="SELECT PASSWORD('".$_POST['password']."') AS PASSCRYPT";
$passEncrypt = $pdo->query($requete)->fetch()['PASSCRYPT'];

// echo $passEncrypt."<br/><br/>";

$sql = "INSERT INTO PERSONNEL 
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE)
VALUES ('".htmlspecialchars($_POST['nom'])."', '".htmlspecialchars($_POST['prenom'])."', '"
.htmlspecialchars($_POST['email'])."', '".$passEncrypt."')";

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