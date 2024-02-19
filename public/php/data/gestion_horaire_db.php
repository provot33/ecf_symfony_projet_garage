<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
http_response_code(500);

// $sql = "INSERT INTO HORAIRE_OUVERTURE 
// (HEURE_OUVERTURE, HEURE_FERMETURE)
// VALUES ('".$_POST['horaire_debut_plage']."', '".$_POST['horaire_fin_plage']."')";
$mavar = implode($_POST);
echo $mavar;
echo "<br/<br/>";
echo 'Lundi :'.$_POST['Lundi_Identifiant'].' - '.$_POST['Lundi_Est_Ouvert'].' - '.$_POST['Lundi_Plage_1'].' - '.$_POST['Lundi_Plage_2'];
echo "<br/<br/>";
echo 'Mardi :'.$_POST['Mardi_Identifiant'].' - '.$_POST['Mardi_Est_Ouvert'];

$traitementOk = true;

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Lundi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Lundi_Identifiant'];
($pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Lundi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

if ($_POST['Lundi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Lundi_Identifiant'].", ".$_POST['Lundi_Plage_1'].")";
    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Lundi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Lundi_Identifiant'].", ".$_POST['Lundi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Mardi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Mardi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Mardi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);


if ($_POST['Mardi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Mardi_Identifiant'].", ".$_POST['Mardi_Plage_1'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Mardi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Mardi_Identifiant'].", ".$_POST['Mardi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Mercredi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Mercredi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Mercredi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

if ($_POST['Mercredi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Mercredi_Identifiant'].", ".$_POST['Mercredi_Plage_1'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Mercredi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Mercredi_Identifiant'].", ".$_POST['Mercredi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Jeudi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Jeudi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Jeudi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

if ($_POST['Jeudi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Jeudi_Identifiant'].", ".$_POST['Jeudi_Plage_1'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Jeudi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Jeudi_Identifiant'].", ".$_POST['Jeudi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Vendredi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Vendredi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Vendredi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

if ($_POST['Vendredi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Vendredi_Identifiant'].", ".$_POST['Vendredi_Plage_1'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Vendredi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Vendredi_Identifiant'].", ".$_POST['Vendredi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Samedi_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Samedi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Samedi_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

if ($_POST['Samedi_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Samedi_Identifiant'].", ".$_POST['Samedi_Plage_1'].")";
    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Samedi_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Samedi_Identifiant'].", ".$_POST['Samedi_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

$sql = "UPDATE JOUR_OUVERTURE 
SET OUVERT=".$_POST['Dimanche_Est_Ouvert']."
WHERE IDENTIFIANT=".$_POST['Dimanche_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);

$sql = "DELETE FROM JOUR_HORAIRE 
WHERE ID_JOUR=".$_POST['Dimanche_Identifiant'];
($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);


if ($_POST['Dimanche_Plage_1'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Dimanche_Identifiant'].", ".$_POST['Dimanche_Plage_1'].")";
    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}
if ($_POST['Dimanche_Plage_2'] != 0) {
    $sql = "INSERT INTO JOUR_HORAIRE (ID_JOUR, ID_HORAIRE)
    VALUES (".$_POST['Dimanche_Identifiant'].", ".$_POST['Dimanche_Plage_2'].")";

    ($traitementOk && $pdo->query($sql, PDO::FETCH_ASSOC)? $traitementOk = true : $traitementOk = false);
}

if ($traitementOk) {
    // Le traitement est un succès
    http_response_code(200);
}

?>