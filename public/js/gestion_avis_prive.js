//const form = document.getElementById("avis_form");
let numElement;

const form = document.getElementById("avis_form");

function validerCommentaire(nombre, id){
    let avis = document.getElementById("avis"+nombre).value;
    
    numElement = nombre;
    let idField = document.getElementById("id_avis");
    if (idField == undefined){
        idField = document.createElement("input");
        idField.setAttribute("type", "hidden");
        idField.setAttribute("id", "id_avis");
        idField.setAttribute("name", "id");
        idField.setAttribute("value", id);
        form.appendChild(idField);
    } else {
        idField.value = id;
    }
    let avisField = document.getElementById("avis_avis");
    if (avisField == undefined){
        avisField = document.createElement('input');
        avisField.setAttribute("type", "hidden");
        avisField.setAttribute("id", "avis_avis");
        avisField.setAttribute("name", "avis");
        avisField.setAttribute("value", avis);
        form.appendChild(avisField);
    } else {
        avisField.value = avis;
    }
}
  
form.addEventListener("submit", (event) => {
event.preventDefault(); // Evite la soumission par défaut du formulaire
//resetErreurFormulaire(); // Remet le fond des champs du formulaire à leur couleur par défaut
let erreurs = [];

// Valide les données saisies
let donneesManqantes = false;
if (form["avis"+numElement].value === "") {
    document.getElementById("avis"+numElement).style.backgroundColor = "#ff0000";
    erreurs.push("L'avis doit être renseigné");
    donneesManqantes = true;
}

if (donneesManqantes) {
    let message = "<p>Le formulaire n'est pas valide<br /><ul>";
    erreurs.forEach((element) => {
    message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs"+numElement).innerHTML = message;
} else {

    const formData = new FormData(form); // Create a FormData object with the form data

    fetch("/php/data/validation_avis_db.php", {
    method: "POST",
    body: formData,
    })
    .then((response) => {
        if (response.ok) {
        // Handle the successful response
        //document.getElementById("boutonEnvoyer").style.display= "none";
        //document.getElementById("boutonRetour").style.display= "block";
        document.getElementById("boutonValider"+numElement).style.display= "none";
        document.getElementById("formulaire_erreurs"+numElement).innerHTML = "L'avis a été validé";
        document.getElementById("formulaire_erreurs"+numElement)
        } else {
        document.getElementById("formulaire_erreurs"+numElement).innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
        alert("Reponse KO !");
        // Handle the error
        }
    })
    .catch((error) => {
        document.getElementById("formulaire_erreurs"+numElement).innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
        alert("Reponse Erreur !");
        // Handle the error
    });
}
});
  