<?php
// Pour valider les rôles obtenus suite à la vérification de session
if (!$ligneUser['EST_ADMINISTRATEUR']){
    Header('Location:/php/gestion/index.php');
}
?>