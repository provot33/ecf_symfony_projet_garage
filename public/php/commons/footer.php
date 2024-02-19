<footer>
    <div>
        <table class="table_horaires">
            <caption><strong>Nos horaires d'ouverture:</strong></caption>

<?php
try {
    $tableau = array();
    $i = 0;
    $jourCourant = 'Hier';
    
    // On récupère les horaires de la semaine et on les formatte pour les afficher dans la table prévue.
    foreach ($pdo->query('SELECT NOM_JOUR, POSITION_JOUR, OUVERT,
        TIME_FORMAT(HEURE_OUVERTURE, \'%H:%i\') AS HEURE_OUVERTURE, 
        TIME_FORMAT(HEURE_FERMETURE, \'%H:%i\') AS HEURE_FERMETURE
        FROM JOUR_OUVERTURE LEFT OUTER JOIN JOUR_HORAIRE ON JOUR_HORAIRE.ID_JOUR = JOUR_OUVERTURE.IDENTIFIANT
        LEFT OUTER JOIN HORAIRE_OUVERTURE ON JOUR_HORAIRE.ID_HORAIRE = HORAIRE_OUVERTURE.IDENTIFIANT
        ORDER BY POSITION_JOUR ASC, HEURE_OUVERTURE ASC', PDO::FETCH_ASSOC) as $horaires) {

        if ($jourCourant !== $horaires['NOM_JOUR']){
            $tableau[$i] = array();
            $tableau[$i]['NOM_JOUR'] = $horaires['NOM_JOUR'];
            $tableau[$i]['OUVERT'] = $horaires['OUVERT'];
            $tableau[$i]['HEURE_OUVERTURE_MATIN'] = $horaires['HEURE_OUVERTURE'];
            $tableau[$i]['HEURE_FERMETURE_MATIN'] = $horaires['HEURE_FERMETURE'];
            $jourCourant = $horaires['NOM_JOUR'];
            $i++;
        } else {
            $i--;
            $tableau[$i]['HEURE_OUVERTURE_APRES_MIDI'] = $horaires['HEURE_OUVERTURE'];
            $tableau[$i]['HEURE_FERMETURE_APRES_MIDI'] = $horaires['HEURE_FERMETURE'];
            $i++;
        }
    }
       
    // Mise en forme HTML des résultats.
    foreach ($tableau as $ligne){ 
        echo '<tr><td>' .$ligne['NOM_JOUR'].'</td><td> : </td><td>';
        if ($ligne['OUVERT']){
            if (isset($ligne['HEURE_OUVERTURE_MATIN'])){
                echo ' '.$ligne['HEURE_OUVERTURE_MATIN'].'-'.$ligne['HEURE_FERMETURE_MATIN'];
            } 
            //echo ' '.$ligne['HEURE_OUVERTURE_MATIN'].'-'.$ligne['HEURE_FERMETURE_MATIN'];
            if (isset($ligne['HEURE_OUVERTURE_APRES_MIDI'])){
                echo ', '.$ligne['HEURE_OUVERTURE_APRES_MIDI'].'-'.$ligne['HEURE_FERMETURE_APRES_MIDI'];
            } 
        } else {
            echo ' Fermé';
        }
        echo '</td></tr>';
    }
} catch (PDOException $e) {

}
?>
        </table>
        <hr>

        <h2 class="h2_center"><a href="/php/formulaires_de_contact_et_avis.php"><i class="bi bi-envelope-at"> </i>Laissez-nous un
                commentaire!</a></h2>
        <h2 class="h2_center"><i class="bi bi-car-front-fill"></i> Garage V. Parrot <br>

<?php
    // Récupération des coordonnées du garage depuis la base de données.
try {
    $sth = $pdo->prepare('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1');
    $sth->execute();
    $coordonnees = $sth->fetch();
    //$coordonnees = $pdo->fetch('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC);
    echo $coordonnees['ADRESSE_RUE1'] . '<br/>';
    if ($coordonnees['ADRESSE_RUE2'] !== '') {
        echo $coordonnees['ADRESSE_RUE2'] . '<br/>';
    }
    echo $coordonnees['CODE_POSTAL'] . ' ' . $coordonnees['VILLE'] . '<br/>';
    echo '<i class="bi bi-telephone-fill">' . $coordonnees['TELEPHONE'] . '</i>';
} catch (PDOException $e) {

}
?>
        </h2>

        <h2 class="h2_center">Copyright© 2024 tous droits reservés</h2>
    </div>
</footer>