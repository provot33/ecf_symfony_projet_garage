# Projet ECF_GARAGE

Ce répertoire contient le nécessaire pour déployer le projet.

## Composants
* **db/scripts** 

Contient les scripts de la base de données, notamment 
le fichier creation.sql qui permet de créer et d'alimenter la base de données.

* **docs**

La documentation du projet, à savoir les fichiers demandés dans le cadre de l'ECF.

* **public**

Le code du projet.
Celui-ci est réparti comme suit :

* * **assets**

Les visuels du site (images, logos, ...)

* * **css**

Les feuilles de styles

* * **html**

Le code html commun

* * **js**

Les fichiers javascript utilisés par le Front Office

* * **node_modules**

Les composants importés pour le Front Office (bootstrap)

* * **php**

Les fichiers php, utilisés par le Back Office pour effectuer les traitements et servir les pages web.

* * les fichiers **index.php** et **prive.php**

La page d'accueil du site et la page de redirection vers la partie privée.

## Mode d'emploi

### Serveur Web 

Une fois redescendu, le projet peut être déployé sur un serveur web type Apache.

Il faudra pour cela préciser le DocumentRoot et Directory dans le fichier httpd.conf comme étant
**~/ecf_symfony_projet_garage/public**

exemple extrait d'un httpd.conf :
```
(...)
DocumentRoot "E:\formation php symphony\repository\ecf_garage\ecf_symfony_projet_garage\public"
<Directory "E:\formation php symphony\repository\ecf_garage\ecf_symfony_projet_garage\public">
(...)
```

La page d'accueil sera alors :
http://localhost/

Pour la partie privée, celle-ci sera accessible grâce à la page de connexion :
http://localhost/prive.php

L'ensemble du projet est conçu pour que le répertoire racine soit le répertoire **/public**.

### Base de données

La base de données est une base MariaDB à alimenter avec le script présent sous 
**/db/scripts/creation.sql**

Ce script alimente la base avec des données.
Ces données comprennent également les personnes autorisées de la partie privée du site.
| Utilisateur  | Mot de passe          | Est Administrateur du Site |
| :--------------- |:---------------| :-----:|
| v.parrot@garage.parrot.fr  |   v.parrot        | OUI |
| j.dupont@garage.parrot.fr  | j.dupont             |  NON |
| k.iourive@garage.parrot.fr  | k.iourive          |    NON |
| c.hingue@garage.parrot.fr  | c.hingue          |    NON |
| a.heinchtaine@garage.parrot.fr  | a.heinchtaine |    NON |

La configuration en local de la base est définie dans le fichier **public/php/commons/connexiondb.php**
Les valeurs prévues sont les suivantes :
```
$dsn = 'mysql:dbname=mon_projet_garage;host=127.0.0.1;port=3306';
$host = 'localhost';
$database = 'mon_projet_garage';
$user = 'root';
$password = '';
```

Si nécessaire, il est possible de passer par un connecteur **JawsDB pour MariaDB**. L'exploitation des valeurs est également prévu dans le même fichier :
```
if (getenv('JAWSDB_MARIA_URL') !== false) {
    // Serveur Heroku
    $dbparts = parse_url(getenv('JAWSDB_MARIA_URL'));

    $host = $dbparts['host'];
    $user = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
}
```

### Serveur Heroku
Il est possible de pouvoir utiliser le site déployé à l'adresse :
https://garage-eb7a768e1ffa.herokuapp.com/public/

Et la partie privée se trouvera sous :
https://garage-eb7a768e1ffa.herokuapp.com/public/prive.php

La liste des utilisateurs présentée dans la partie **Base de données** ci-dessus est également valable sur ce site. 

La base de données associée est disponible à l'adresse suivante :

* **Hostname** : j5zntocs2dn6c3fj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com

* **Port** : 3306

* **Username** : cz02uo6310nxgb92

* **Password** :  Contacter la propriétaire du projet pour avoir le mot de passe.






