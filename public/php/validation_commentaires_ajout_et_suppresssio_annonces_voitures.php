<!DOCTYPE html>
<html lang="fr">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/connexiondb.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/mon_premier_garage.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/html/header.html');
    ?>
    <main>
        <div>
            <form method="post">
                <fieldset>
                    <legend>Ajouter une annonce de voitures:</legend>
                    <div>
                        <label for="Marque du véhicule">Marque du véhicule:</label>
                        <input type="text" id="Marque du véhicule">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Année de construction">Année de construction:</label>
                        <input type="text" id="Année de construction">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Kilométrage">kilométrage:</label>
                        <input type="text" id="Kilométrage">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Energie">Energie:</label>
                        <input type="text" id="Energie">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Nombre de portes">Nombre de portes:</label>
                        <input type="text" id="Nombre de portes">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Prix">Prix:</label>
                        <input type="text" id="Prix">
                    </div>

                    <div class="div_centre">
                        <button type="submit"> Envoyer</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div>
            <form method="post">
                <fieldset>
                    <legend>Validation des commentaires:</legend>
                    <div>
                        <label for="Commentaire">Commentaire:</label>
                        <input type="text" id="commentaire">
                    </div>
                    <div class="div_centre">
                        <button type="submit"> Accepter</button>
                    </div>
                    <div class="div_centre">
                        <button type="submit"> Refuser</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div>
            <form method="post">
                <fieldset>
                    <legend>Ajout d'un commentaire client:</legend>
                    <div>
                        <label for="Nom">Mon nom:</label>
                        <input type="text" id="Nom" placeholder="Dupont.....">
                    </div>
                    <div>
                        <label style="width: 5em;" for="Prénom">Mon prénom:</label>
                        <input type="text" id="Prénom" placeholder="José...">
                    </div>
                    <div>
                        <textarea id="Message" rows="10" , cols="50">Mon avis:</textarea>
                    </div>
                    <div class="div_centre">
                        <button type="submit"> Envoyer</button>
                    </div>
                </fieldset>
            </form>
        </div>

    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/commons/footer.php';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/html/script.html');
?>
</body>

</html>