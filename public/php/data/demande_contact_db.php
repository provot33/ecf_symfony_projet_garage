<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);

$query = $pdo->prepare(
    "INSERT INTO FORMULAIRE_CONTACT 
        (NOM_AUTEUR, PRENOM_AUTEUR, COURRIEL_AUTEUR, TELEPHONE_AUTEUR, ID_SUJET, TEXTE_FORMULAIRE)
        VALUES
        (:nom, :prenom, :email, :telephone, :id_sujet, :message)");
$query->bindParam(':nom', htmlspecialchars($_POST['nom']), PDO::PARAM_STR);
$query->bindParam(':prenom', htmlspecialchars($_POST['prenom']), PDO::PARAM_STR);
$query->bindParam(':email', htmlspecialchars($_POST['email']), PDO::PARAM_STR);
$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
$query->bindParam(':id_sujet', $_POST['id_sujet'], PDO::PARAM_INT);
$query->bindParam(':message', htmlspecialchars($_POST['message']), PDO::PARAM_STR);

if ($query->execute()) {
    // Le traitement est un succès
    http_response_code(200);
}
?>