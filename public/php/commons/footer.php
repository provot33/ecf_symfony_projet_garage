<footer>
    <div>
        <table class="table_horaires">
            <caption><strong>Nos horaires d'ouverture:</strong></caption>
            <tr>
                <td> Lundi</td>
                <td>:</td>
                <td> 9:00-12:00, 14:00-19:00</td>
            </tr>
            <tr>
                <td> Mardi</td>
                <td>:</td>
                <td> 9:00-12:00, 14:00-19:00</td>
            </tr>
            <tr>
                <td> Mercredi</td>
                <td>:</td>
                <td> 9:00-12:00, 14:00-19:00</td>
            </tr>
            <tr>
                <td> Jeudi</td>
                <td>:</td>
                <td> 9:00-12:00, 14:00-19:00</td>
            </tr>
            <tr>
                <td> Vendredi</td>
                <td>:</td>
                <td> 9:00-12:00, 14:00-19:00</td>
            </tr>
            <tr>
                <td> Samedi</td>
                <td>:</td>
                <td> 9:00-12:00, 13:00-20:00</td>
            </tr>
            <tr>
                <td> Dimanche</td>
                <td>:</td>
                <td> Fermé</td>
            </tr>
        </table>

        <hr>

        <h2 class="h2_center"><a href="/php/formulaires_de_contact_et_avis.php"><i class="bi bi-envelope-at"> </i>Laissez-nous un
                commentaire!</a></h2>

                
        <h2 class="h2_center"><i class="bi bi-car-front-fill"></i> Garage V. Parrot <br>
<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
/* Comme on inclus dans une page où la connexion est faite, on tente de s'en passer ici !

$dsn = 'mysql:dbname=mon_projet_garage;host=127.0.0.1;port=3306';
$user = 'root';
$password = '';
*/
/*
$DBH = new PDO( "connection string goes here" );
$STH - $DBH -> prepare( "select figure from table1 ORDER BY x LIMIT 1" );

$STH -> execute();
$result = $STH -> fetch();
echo $result ["figure"];

$DBH = null;
*/
try {
    $sth = $pdo -> prepare('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1');
    $sth -> execute();
    $coordonnees = $sth -> fetch();
    //$coordonnees = $pdo->fetch('SELECT TELEPHONE, ADRESSE_RUE1, ADRESSE_RUE2, CODE_POSTAL, VILLE FROM COORDONNEES WHERE IDENTIFIANT = 1', PDO::FETCH_ASSOC);
    echo $coordonnees['ADRESSE_RUE1'].'<br/>';
    if ($coordonnees['ADRESSE_RUE2'] !== ''){
        echo $coordonnees['ADRESSE_RUE2'].'<br/>';
    }
    echo $coordonnees['CODE_POSTAL'].' '.$coordonnees['VILLE'].'<br/>';
    echo '<i class="bi bi-telephone-fill">'.$coordonnees['TELEPHONE'].'</i>';
} catch (PDOException $e) {
    
}
?>
        </h2>

        <h2 class="h2_center">Copyright© 2024 tous droits reservés</h2>
    </div>
</footer>