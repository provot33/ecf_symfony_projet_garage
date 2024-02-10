<html>
    <body>
<?php echo implode(' :: ', array_keys($_POST)); ?>
<br />
<?php echo implode(' :: ', $_POST); ?>
 
<br />

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';

$sql = "INSERT INTO FORMULAIRE_CONTACT 
(NOM_AUTEUR, PRENOM_AUTEUR, COURRIEL_AUTEUR, TELEPHONE_AUTEUR, ID_SUJET, TEXTE_FORMULAIRE)
VALUES ('".htmlspecialchars($_POST['nom'])."', '".htmlspecialchars($_POST['prenom'])."', '"
.htmlspecialchars($_POST['email'])."', '".htmlspecialchars($_POST['telephone'])."', "
.$_POST['objet_contact'].", '".htmlspecialchars($_POST['message'])."')";
// $sql = "SELECT * FROM FORMULAIRE_CONTACT";

echo $sql."<br/><br/>";
// $result = $pdo->query($sql, PDO::FETCH_ASSOC);
// //echo $result;
// echo "<br/<br/>";
// echo $result->rowCount();
// echo "<br/<br/>";
if ($pdo->query($sql)->rowCount() === 1) {
    echo 'Insertion en base Ok';
} else {
    echo 'Error : '.$sql.'<br />'.$pdo->error;
}
?>


    </body>
</html>