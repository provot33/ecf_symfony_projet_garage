let formatPrix = wNumb({
    mark: ',',
    thousand:' ',
    suffix:' €',
    decimals: 0
})

let formatKilometre = wNumb({
    mark: ',',
    thousand:' ',
    suffix:' km',
    decimals: 0
})

// Définition et Gestion des Sliders 
let sliderPrix = document.getElementById('slider-prix');

let sliderPrixValues = [
    document.getElementById('prix-min'),
    document.getElementById('prix-max')
];

noUiSlider.create(sliderPrix, {
    start: [5000, 500000],
    //tooltips: [formatPrix, formatPrix],
    handleAttributes: [
        { 'aria-label': 'minimum' },
        { 'aria-label': 'maximum' },
    ],
    connect: [false, true, false],
    range: {
        'min': [5000, 500],
        '30%': [15000, 1000],
        '65%': [50000, 10000],
        '90%': [1000000, 50000],
        'max': [100000000]
    }
});

sliderPrix.noUiSlider.on('update', function (values, handle) {
    sliderPrixValues[handle].value = formatPrix.to(formatPrix.from(values[handle]));
    alimenteListing();
});

document.getElementById('prix-min').onchange = function(){
    sliderPrix.noUiSlider.set([formatPrix.from(document.getElementById('prix-min').value), null])
    alimenteListing();
};

document.getElementById('prix-max').onchange = function(){
    sliderPrix.noUiSlider.set([null, formatPrix.from(document.getElementById('prix-max').value)])
    alimenteListing();
};

let sliderKilometre = document.getElementById('slider-kilometre');

let sliderKilometreValues = [
    document.getElementById('kilometre-min'),
    document.getElementById('kilometre-max')
];

noUiSlider.create(sliderKilometre, {
    start: [0, 200000],
    //tooltips: [formatKilometre, formatKilometre],
    handleAttributes: [
        { 'aria-label': 'minimum' },
        { 'aria-label': 'maximum' },
    ],
    connect: [false, true, false],
    range: {
        'min': [0, 1000],
        '30%': [40000, 1000],
        '65%': [100000, 1000],
        '90%': [200000, 1000],
        'max': [1000000]
    }
});

sliderKilometre.noUiSlider.on('update', function (values, handle) {
    sliderKilometreValues[handle].value = formatKilometre.to(formatKilometre.from(values[handle]));
    alimenteListing();
});

document.getElementById('kilometre-min').onchange = function(){
    sliderKilometre.noUiSlider.set([formatKilometre.from(document.getElementById('kilometre-min').value), null])
    alimenteListing();
};

document.getElementById('kilometre-max').onchange = function(){
    sliderKilometre.noUiSlider.set([null, formatKilometre.from(document.getElementById('kilometre-max').value)])
    alimenteListing();
};

document.getElementById("type_marque").onchange = function(){
    alimenteListing();
};
document.getElementById("type_energie").onchange = function(){
    alimenteListing();
};
document.getElementById("type_nbPortes").onchange = function(){
    alimenteListing();
};

// Gestion du filtrage

function prepareListing(callback) {
    document.getElementById("liste_cartes").innerHTML = "";
    let marqueSelectionnee = document.getElementById("type_marque");
    let energieSelectionnee = document.getElementById("type_energie");
    let nbPortesSelectionnee = document.getElementById("type_nbPortes");
    let prixMin = formatPrix.from(document.getElementById("prix-min").value);
    let prixMax = formatPrix.from(document.getElementById("prix-max").value);
    let kilometrageMin = formatKilometre.from(document.getElementById("kilometre-min").value);
    let kilometrageMax = formatKilometre.from(document.getElementById("kilometre-max").value);
    vehicules.forEach(vehicule => {
        let ajouteVehicule = true;
        if (vehicule.prix < prixMin || vehicule.prix > prixMax ) {
            ajouteVehicule = false;
        }
        if (vehicule.kilometrage < kilometrageMin || vehicule.kilometrage > kilometrageMax ) {
            ajouteVehicule = false;
        }
        if (ajouteVehicule && marqueSelectionnee.value !== "0"  ) {
            if (marqueSelectionnee.options[marqueSelectionnee.selectedIndex].text !== vehicule.marque){
                ajouteVehicule = false;
            }
        }
        if (ajouteVehicule && energieSelectionnee.value !== "0") {
            if (energieSelectionnee.options[energieSelectionnee.selectedIndex].text !== vehicule.motorisation){
                ajouteVehicule = false;
            }
        }
        if (ajouteVehicule && nbPortesSelectionnee.value !== "0") {
            if (nbPortesSelectionnee.value !== vehicule.nbPortes){
                ajouteVehicule = false;
            }
        }
        if (ajouteVehicule) {
            callback.apply(this, [vehicule]);
        }
    });
};

function ajouteCarte(vehicule) {
    let carte = '<div class="card"><div class="card-inner"><div class="card-front"><div class="card-content">';
    carte += '<h2>' + vehicule.marque + ' ' + vehicule.modele + '</h2>';
    carte += '<img class="img_card" src="' + vehicule.urlMiniature + '" alt="visuel vehicule">';
    carte += '<h2>' + formatKilometre.to(formatKilometre.from(vehicule.kilometrage)) + '</h2>';
    carte += '<h2>' + vehicule.motorisation + '</h2>';
    carte += '<h2>' + formatPrix.to(formatKilometre.from(vehicule.prix)) + '</h2>';
    carte += '</div></div><div class="card-back"><h2>Equipements</h2>';
    carte += '<p>' + vehicule.miseEnAvant1 + '</p>';
    carte += '<p>' + vehicule.nbPortes + ' portes</p>';
    carte += '<p>' + vehicule.miseEnAvant2 + '</p>';
    carte += '<p>' + vehicule.miseEnAvant3 + '</p>';
    if (vehicule.miseEnAvant4 !== null){
        carte += '<p>' + vehicule.miseEnAvant4 + '</p>';
    }
    if (vehicule.miseEnAvant5 !== null){
        carte += '<p>' + vehicule.miseEnAvant5 + '</p>';
    }
    carte += '<p>' + vehicule.annee + '</p>';
    carte += '<a href="/php/detail_vehicule.php?vehicule=' + vehicule.identifiant + '">Plus de détails</a>';
    carte += '</div></div></div>';

    document.getElementById("liste_cartes").innerHTML += carte;
};

function ajouteCartePrive(vehicule) {
    let carte = '<div class="card"><div class="card-inner"><div class="card-front"><div class="card-content">';
    let referenceOffre = "";
    let idVehicule = "" + vehicule.identifiant;
    for (i=0; i < 6 - idVehicule.length; i++){
        referenceOffre += "0";
    }
    referenceOffre += vehicule.identifiant;
    carte += '<h2>REF_' + referenceOffre + '</h2>';
    carte += '<h2>' + vehicule.marque + ' ' + vehicule.modele + '</h2>';
    carte += '<img class="img_card" src="' + vehicule.urlMiniature + '" alt="visuel vehicule">';
    carte += '<div class="card-front-bottom"><h2>' + formatKilometre.to(formatKilometre.from(vehicule.kilometrage)) + '</h2>';
    carte += '<h2>' + vehicule.motorisation + '</h2>';
    carte += '<h2>' + formatPrix.to(formatKilometre.from(vehicule.prix)) + '</h2></div>';
    carte += '</div></div><div class="card-back"><h2>Equipements</h2>';
    carte += '<p>' + vehicule.miseEnAvant1 + '</p>';
    carte += '<p>' + vehicule.nbPortes + ' portes</p>';
    carte += '<p>' + vehicule.miseEnAvant2 + '</p>';
    carte += '<p>' + vehicule.miseEnAvant3 + '</p>';
    if (vehicule.miseEnAvant4 !== null){
        carte += '<p>' + vehicule.miseEnAvant4 + '</p>';
    }
    if (vehicule.miseEnAvant5 !== null){
        carte += '<p>' + vehicule.miseEnAvant5 + '</p>';
    }
    carte += '<p>' + vehicule.annee + '</p>';
    carte += '<a href="/php/gestion/detail_vehicule.php?vehicule=' + vehicule.identifiant + '">Plus de détails</a>';
    carte += '</div></div></div>';

    document.getElementById("liste_cartes").innerHTML += carte;
};

function alimenteListing() {
    prepareListing(ajouteCarte);
};

alimenteListing();