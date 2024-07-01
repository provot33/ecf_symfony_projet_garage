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
        // $contenuPost .= '{"ids_vehicule":[';
        // $firstElem = true;
        // foreach ($pdo->query('SELECT IDENTIFIANT FROM vehicule ORDER BY IDENTIFIANT ASC', PDO::FETCH_ASSOC) as $idvehicule) {
        //     if ($firstElem) {
        //         $firstElem = false;
        //     } else {
        //         $contenuPost .= ", ";
        //     }
        //     $contenuPost .= $idvehicule['IDENTIFIANT'];
        // }
        // $contenuPost .= ']}';
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
    // echo $contenuPost;
    // throw new \Exception("Effet Traitement : ".$contenuPost);
} catch (\Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}

function ajouteElements($ajouts, $pdo): void
{
    // Ajout de chaque ligne
    foreach ($ajouts as $vehicule) {
        // $repository->insert($ajout);
        $query = $pdo->prepare(
            "INSERT INTO VEHICULE
                (MARQUE, MODELE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
                VALUES
                (:marque, :modele, :prix, :kilometrage, :motorisation, :annee, :nbPortes, :urlMini, :miseAvant1, :miseAvant2, :miseAvant3)");
        $query->bindParam(':marque', htmlspecialchars($vehicule['vehiculeMarque_']), PDO::PARAM_STR);
        $query->bindParam(':marque', htmlspecialchars($vehicule['vehiculeMarque_']), PDO::PARAM_STR);
        $query->bindParam(':modele', htmlspecialchars($vehicule['vehiculeModele_']), PDO::PARAM_STR);
        $query->bindParam(':prix', $vehicule['vehiculePrix_'], PDO::PARAM_INT);
        $query->bindParam(':kilometrage', $vehicule['vehiculeKm_'], PDO::PARAM_INT);
        $query->bindParam(':motorisation', htmlspecialchars($vehicule['vehiculeMotorisation_']), PDO::PARAM_STR);
        $query->bindParam(':annee', htmlspecialchars($vehicule['vehiculeAnnee_']), PDO::PARAM_INT);
        $query->bindParam(':nbPortes', $vehicule['vehiculePorte_'], PDO::PARAM_INT);
        $query->bindParam(':urlMini', $vehicule['vehiculeUrl_'], PDO::PARAM_STR);
        $query->bindParam(':miseAvant1', htmlspecialchars($vehicule['vehiculeMiseEnAvant1_']), PDO::PARAM_STR);
        $query->bindParam(':miseAvant2', htmlspecialchars($vehicule['vehiculeMiseEnAvant2_']), PDO::PARAM_STR);
        $query->bindParam(':miseAvant3', htmlspecialchars($vehicule['vehiculeMiseEnAvant3_']), PDO::PARAM_STR);
        $query->execute();
    }
}

function supprimeElements($suppressions, $pdo): void
{
    // Suppression de chaque ligne
    foreach ($suppressions as $suppression) {
        $query = $pdo->prepare("DELETE FROM VEHICULE WHERE IDENTIFIANT = :id");
        $query->bindParam(':id', $suppression, PDO::PARAM_INT);
        $query->execute();
    }
}

function modifieElements($modifications, $pdo): void
{
    // $detailTraitement = "";
    // Mise à jour de chaque ligne
    foreach ($modifications as $vehicule) {
        $updateMarque = (isset($vehicule['vehiculeMarque_']));
        $updateModele = (isset($vehicule['vehiculeModele_']));
        $updateAnnee = (isset($vehicule['vehiculeAnnee_']));
        $updateUrl = (isset($vehicule['vehiculeUrl_']));
        $updateKm = (isset($vehicule['vehiculeKm_']));
        $updateMotorisation = (isset($vehicule['vehiculeMotorisation_']));
        $updatePrix = (isset($vehicule['vehiculePrix_']));
        $updatePorte = (isset($vehicule['vehiculePorte_']));
        $updateEnAvant1 = (isset($vehicule['vehiculeMiseEnAvant1_']));
        $updateEnAvant2 = (isset($vehicule['vehiculeMiseEnAvant2_']));
        $updateEnAvant3 = (isset($vehicule['vehiculeMiseEnAvant3_']));

        $nbValues = 0;
        $setValues = "";
        if ($updateMarque) {
            $setValues .= "MARQUE = :marque";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de name";
        }
        if ($updateModele) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MODELE = :modele";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de firstname";
        }
        if ($updateAnnee) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "ANNEE = :annee";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de email";
        }
        if ($updateUrl) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "URLMINIATURE = :urlMini";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de password";
        }
        if ($updateKm) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "KILOMETRAGE = :kilometrage";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de creationDate";
        }
        if ($updateMotorisation) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MOTORISATION = :motorisation";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de name";
        }
        if ($updatePrix) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "PRIX = :prix";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de firstname";
        }
        if ($updatePorte) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "NOMBRE_DE_PORTES = :nbPortes";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de email";
        }
        if ($updateEnAvant1) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MISE_EN_AVANT1 = :miseAvant1";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de password";
        }
        if ($updateEnAvant2) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MISE_EN_AVANT2 = :miseAvant2";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de creationDate";
        }
        if ($updateEnAvant3) {
            if ($nbValues > 0) {
                $setValues .= ", ";
            }
            $setValues .= "MISE_EN_AVANT3 = :miseAvant3";
            $nbValues++;
            // $detailTraitement .= "<br/>Prise en compte de creationDate";
        }

        // $detailTraitement .= "<br/>L'Update devrait être :<br/>SET " . $setValues;

        $query = $pdo->prepare(
            "UPDATE vehicule
                    SET " . $setValues . "
                    WHERE IDENTIFIANT = :id");
        if ($updateMarque) {
            $marque = htmlspecialchars($vehicule['vehiculeMarque_']);
            $query->bindParam(':marque', $marque, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeMarque_";
        }
        if ($updateModele) {
            $modele = htmlspecialchars($vehicule['vehiculeModele_']);
            $query->bindParam(':modele', $modele, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeModele_";
        }
        if ($updateAnnee) {
            $query->bindParam(':annee', $vehicule['vehiculeAnnee_'], PDO::PARAM_INT);
            // $detailTraitement .= "<br/>Binding de vehiculeAnnee_";
        }
        if ($updateUrl) {
            $query->bindParam(':urlMini', $vehicule['vehiculeUrl_'], PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeUrl_";
        }
        if ($updateKm) {
            $query->bindParam(':kilometrage', $vehicule['vehiculeKm_'], PDO::PARAM_INT);
            // $detailTraitement .= "<br/>Binding de vehiculeKm_";
        }
        if ($updateMotorisation) {
            $motorisation = htmlspecialchars($vehicule['vehiculeMotorisation_']);
            $query->bindParam(':motorisation', $motorisation, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeMotorisation_";
        }
        if ($updatePrix) {
            $prix = htmlspecialchars($vehicule['vehiculePrix_']);
            $query->bindParam(':prix', $prix, PDO::PARAM_INT);
            // $detailTraitement .= "<br/>Binding de vehiculePrix_";
        }
        if ($updatePorte) {
            $query->bindParam(':nbPortes', $vehicule['vehiculePorte_'], PDO::PARAM_INT);
            // $detailTraitement .= "<br/>Binding de vehiculePorte_";
        }
        if ($updateEnAvant1) {
            $mea1 = htmlspecialchars($vehicule['vehiculeMiseEnAvant1_']);
            $query->bindParam(':miseAvant1', $mea1, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeMiseEnAvant1_";
        }
        if ($updateEnAvant2) {
            $mea2 = htmlspecialchars($vehicule['vehiculeMiseEnAvant2_']);
            $query->bindParam(':miseAvant2', $mea2, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeMiseEnAvant2_";
        }
        if ($updateEnAvant3) {
            $mea3 = htmlspecialchars($vehicule['vehiculeMiseEnAvant3_']);
            $query->bindParam(':miseAvant3', $mea3, PDO::PARAM_STR);
            // $detailTraitement .= "<br/>Binding de vehiculeMiseEnAvant3_";
        }
        $query->bindParam(':id', $vehicule['vehiculeId_'], PDO::PARAM_INT);
        // $detailTraitement .= "<br/>Binding de vehiculeId_";

        // throw new Exception($detailTraitement);
        $query->execute();

        //********************************************************* */
    }
}

// // Encryptage du mot de passe
// $requete ="SELECT PASSWORD('".$_POST['password']."') AS PASSCRYPT";
// $passEncrypt = $pdo->query($requete)->fetch()['PASSCRYPT'];

// // echo $passEncrypt."<br/><br/>";

// $sql = "INSERT INTO vehicule
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
