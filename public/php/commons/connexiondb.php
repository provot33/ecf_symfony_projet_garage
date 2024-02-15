<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=mon_projet_garage;host=127.0.0.1;port=3306';
$host = 'localhost';
$database = 'mon_projet_garage';
$user = 'root';
$password = '';

/* Base de données MariaDB dans le cloud */
// mysql://cz02uo6310nxgb92:jhrhmf9jr48frgj3@j5zntocs2dn6c3fj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/b9f6eocr4cy1skg2
// echo 'Valeur de JAWSDB_MARIA_URL : ' . getenv('JAWSDB_MARIA_URL');

if (getenv('JAWSDB_MARIA_URL') !== false) {
    // Serveur Heroku
    $dbparts = parse_url(getenv('JAWSDB_MARIA_URL'));

    $host = $dbparts['host'];
    $user = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
}

$dsn = 'mysql:dbname=' . $database . ';host=' . $host . ';port=3306';

try {

    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {

}
