<?php

include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
// Démarrage de la session
session_start();

// On vérifie si le champ Login n'est pas vide.
if (!isset($_SESSION['LOGIN'])) {
// Si c'est le cas, le visiteur ne s'est pas connecter et subit une redirection
    Header('Location:/php/login/connexion.php');
    exit;
}

$requete ="SELECT PASSWORD('".$_SESSION['PASSWORD']."') AS PASSCRYPT";
$passEncrypt = $pdo->query($requete)->fetch()['PASSCRYPT'];

$checkUser = false;

// On interroge la base de donnée Mysql sur le nom des users enregistrés
$requete = "SELECT NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR FROM PERSONNEL WHERE ADRESSE_COURRIEL = ".
    "'".$_SESSION['LOGIN']."'";
$ligneUser = $pdo->query($requete, PDO::FETCH_ASSOC)->fetch();

if (isset($ligneUser['MOT_DE_PASSE'])){
    if ($passEncrypt == $ligneUser['MOT_DE_PASSE']) {
        $checkUser = true;
    }
}

// Si l'utilisateur n'est pas valide on redirige vers la connexion
if ($checkUser == false) {
    if (isset($_SESSION['LOGIN_COUNT']))
    {
        $_SESSION['LOGIN_COUNT']++;
        if ($_SESSION['LOGIN_COUNT'] > 3)
        {
            Header('Location:/index.php');
            exit;
        }   
    } else {
        $_SESSION['LOGIN_COUNT'] = 1;
    }
    Header('Location:/php/login/connexion.php');
    exit;
}
