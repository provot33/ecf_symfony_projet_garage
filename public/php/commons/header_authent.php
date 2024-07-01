<header>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img class="logo" src="/assets/logo/logo_garage.png"
                    alt="Garrage V.Parrot"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/php/gestion/index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="./#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Gestion des Vehicules
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="/php/gestion/gestion_vehicule.php">Rechercher un Véhicule</a>
                            </li>
                            <li>
                                <a class="nav-link" href="/php/gestion/ajout_vehicule.php">Ajouter un Vehicule</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="./#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Gestion du Garage
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="/php/formulaires_d_avis.php">Laisser un Avis</a>
                            </li>
                            <li><a class="dropdown-item" href="/php/gestion/validation_avis.php">Valider les Avis</a></li>
<?php
    if ($ligneUser['EST_ADMINISTRATEUR']){
        echo '<li><hr class="dropdown-divider"></li>'.
            '<li><a class="dropdown-item" href="/php/gestion/gestion_salarie.php">'.
            'Gestion des Salariés</a></li>'.
            '<li><a class="dropdown-item" href="/php/gestion/gestion_horaires.php">'.
            'Gérer les horaires</a></li>';
    }
?>
                        </ul>
                    </li>
                </ul>
                <p>
                    <button class="btn"><a href="/php/login/logout.php">Deconnexion</a></button>
                </p>
            </div>
        </div>
    </nav>
    <!--fin navbar-->
</header>