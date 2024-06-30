<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// On considère que le traitement va partir en erreur
try {
    $contenuPost = "";

    if (isset($_POST['ajout']) && !empty($_POST['ajout']) && $_POST['ajout'] != "{}") {
        $ajouts = json_decode($_POST['ajout'], true);
        $contenuPost .= "<hr/><br/>Nb d'éléments à ajouter : " . count($ajouts);
        $contenuPost .= "<br/>" . implode(", ", array_keys($ajouts));
        foreach ($ajouts as $ajout) {
            foreach (array_keys($ajout) as $key) {
                $contenuPost .= "<br/>Clé = " . $key . " : Valeur = " . $ajout[$key];
            }
        }
        ajouteElements($ajouts, $pdo);
        $contenuPost .= '{"ids_personnel":[';
        $firstElem = true;
        foreach ($pdo->query('SELECT IDENTIFIANT FROM PERSONNEL ORDER BY IDENTIFIANT ASC', PDO::FETCH_ASSOC) as $idPersonnel) {
            if ($firstElem) {
                $firstElem = false;
            } else {
                $contenuPost .= ", ";
            }
            $contenuPost .= $idPersonnel['IDENTIFIANT'];
        }
        $contenuPost .= ']}';
    }
    if (isset($_POST['suppression']) && !empty($_POST['suppression'])) {
        $suppressions = explode(',', $_POST['suppression']);
        $contenuPost .= "<br/>Nb d'éléments à supprimer : " . count($suppressions);
        supprimeElements($suppressions, $pdo);
    }
    if (isset($_POST['modification']) && !empty($_POST['modification']) && $_POST['modification'] != "{}") {
        $contenuPost .= "<br/>Modification : " . $_POST['modification'];
        $modifications = json_decode($_POST['modification'], true);
        $contenuPost .= "<hr/><br/>Nb d'éléments à modifier : " . count($modifications);
        $contenuPost .= "<br/>" . implode(", ", array_keys($modifications));
        foreach ($modifications as $modification) {
            foreach (array_keys($modification) as $key) {
                $contenuPost .= "<br/>Clé = " . $key . " : Valeur = " . $modification[$key];
            }
        }

        modifieElements($modifications, $pdo);

    }
    http_response_code(200);
    echo $contenuPost;
    // throw new \Exception("Effet Traitement : ".$contenuPost);
} catch (\Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}

function ajouteElements($ajouts, $pdo): void
{
    // Ajout de chaque ligne
    foreach ($ajouts as $personnel) {
        // $repository->insert($ajout);
        $query = $pdo->prepare(
            "INSERT INTO PERSONNEL
                (NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
                VALUES
                (:nom, :prenom, :courriel, PASSWORD(:motDePasse), :estAdmin)");
        $query->bindParam(':nom', htmlspecialchars($personnel['personnelName_']), PDO::PARAM_STR);
        $query->bindParam(':prenom', htmlspecialchars($personnel['personnelFirstname_']), PDO::PARAM_STR);
        $query->bindParam(':courriel', $personnel['personnelEmail_'], PDO::PARAM_STR);
        $query->bindParam(':motDePasse', $personnel['personnelPwd_'], PDO::PARAM_STR);
        $estAdmin = ($personnel['personnelAdmin_'] == "1" ? true : false);
        $query->bindParam(':estAdmin', $estAdmin, PDO::PARAM_BOOL);
        $query->execute();
    }
}

function supprimeElements($suppressions, $pdo): void
{
    // Suppression de chaque ligne
    foreach ($suppressions as $suppression) {
        $query = $pdo->prepare("DELETE FROM PERSONNEL WHERE IDENTIFIANT = :id");
        $query->bindParam(':id', $suppression, PDO::PARAM_INT);
        $query->execute();
    }
}

function modifieElements($modifications, $pdo): void
{
    // Mise à jour de chaque ligne
    foreach ($modifications as $personnel) {
        $updateName = (isset($personnel['personnelName_']));
        $updateFirstname = (isset($personnel['personnelFirstname_']));
        $updateEmail = (isset($personnel['personnelEmail_']));
        $updatePassword = (isset($personnel['personnelPwd_']));
        $updateAdmin = (isset($personnel['personnelAdmin_']));

        $nbValues = 0;
        $setValues = "";
        if ($updateName) {
            $setValues .= "NOM = :name";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de name";
        }
        if ($updateFirstname) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "PRENOM = :firstname";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de firstname";
        }
        if ($updateEmail) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "ADRESSE_COURRIEL = :email";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de email";
        }
        if ($updatePassword) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MOT_DE_PASSE = PASSWORD(:password)";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de password";
        }
        if ($updateAdmin) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "EST_ADMINISTRATEUR = :estAdmin";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de creationDate";
        }

        // $detailTraitement .= "<br/>L'Update devrait être :<br/>SET " . $setValues;

        $query = $pdo->prepare(
            "UPDATE PERSONNEL
                    SET " . $setValues . "
                    WHERE IDENTIFIANT = :id");
        if ($updateName) {
            $query->bindParam(':name', htmlspecialchars($personnel['personnelName_']), PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de name";
        }
        if ($updateFirstname) {
            $query->bindParam(':firstname', htmlspecialchars($personnel['personnelFirstname_']), PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de firstname";
        }
        if ($updateEmail) {
            $query->bindParam(':email', $personnel['personnelEmail_'], PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de email";
        }
        if ($updatePassword) {
            $query->bindParam(':password', $personnel['personnelPwd_'], PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de password";
        }
        if ($updateAdmin) {
            $estAdmin = ($personnel['personnelAdmin_'] == "1" ? true : false);
            $query->bindParam(':estAdmin', $estAdmin, PDO::PARAM_BOOL);
            // $detailTraitement .= "<br/>Binding de creationDate";
        }
        $query->bindParam(':id', $personnel['personnelId_'], PDO::PARAM_INT);
        // $detailTraitement .= "<br/>Binding de Id";

        // throw new Exception($detailTraitement);
        $query->execute();

        //********************************************************* */
    }
}

// // Encryptage du mot de passe
// $requete ="SELECT PASSWORD('".$_POST['password']."') AS PASSCRYPT";
// $passEncrypt = $pdo->query($requete)->fetch()['PASSCRYPT'];

// // echo $passEncrypt."<br/><br/>";

// $sql = "INSERT INTO PERSONNEL
// (NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE)
// VALUES ('".htmlspecialchars($_POST['nom'])."', '".htmlspecialchars($_POST['prenom'])."', '"
// .htmlspecialchars($_POST['email'])."', '".$passEncrypt."')";

// // echo $sql."<br/><br/>";
// // $result = $pdo->query($sql, PDO::FETCH_ASSOC);
// // echo $result;
// // echo "<br/<br/>";
// // echo $result->rowCount();
// // echo "<br/<br/>";

// if ($pdo->query($sql, PDO::FETCH_ASSOC)) {
//     // Le traitement est un succès
//     http_response_code(200);
// }
