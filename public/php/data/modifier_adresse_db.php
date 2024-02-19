<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);
// Encryptage du mot de passe

/*
UPDATE [LOW_PRIORITY] [IGNORE] table_reference 
  [PARTITION (partition_list)]
  [FOR PORTION OF period FROM expr1 TO expr2]
  SET col1={expr1|DEFAULT} [,col2={expr2|DEFAULT}] ...
  [WHERE where_condition]
  [ORDER BY ...]
  [LIMIT row_count]
*/

$sql = "UPDATE COORDONNEES 
SET TELEPHONE='".htmlspecialchars($_POST['telephone'])."',
ADRESSE_RUE1='".htmlspecialchars($_POST['adresse_rue1'])."',
ADRESSE_RUE2='".htmlspecialchars($_POST['adresse_rue2'])."',
CODE_POSTAL='".htmlspecialchars($_POST['code_postal'])."',
VILLE='".htmlspecialchars($_POST['ville'])."'
WHERE IDENTIFIANT=1";

echo $sql."<br/><br/>";
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