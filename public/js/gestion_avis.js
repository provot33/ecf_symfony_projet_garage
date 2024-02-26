function resetErreurFormulaire() {
  document.getElementById("nom").style.backgroundColor = "";
  document.getElementById("prenom").style.backgroundColor = "";
  document.getElementById("message").style.backgroundColor = "";
  document.getElementById("boutonEnvoyer").style.display= "block";
  document.getElementById("boutonRetour").style.display= "none";
}

const form = document.getElementById("avis_form");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // Evite la soumission par défaut du formulaire
  resetErreurFormulaire(); // Remet le fond des champs du formulaire à leur couleur par défaut
  let erreurs = [];

  // Valide les données saisies
  let donneesManqantes = false;
  if (form["nom"].value === "") {
    document.getElementById("nom").style.backgroundColor = "#ff0000";
    erreurs.push("Le nom doit être renseigné");
    donneesManqantes = true;
  }
  if (form["prenom"].value === "") {
    document.getElementById("prenom").style.backgroundColor = "#ff0000";
    erreurs.push("Le prénom doit être renseigné");
    donneesManqantes = true;
  }
  if (form["email"].value === "") {
    document.getElementById("email").style.backgroundColor = "#ff0000";
    erreurs.push("Le courriel doit être renseigné");
    donneesManqantes = true;
  }
  if (form["message"].value === "") {
    document.getElementById("message").style.backgroundColor = "#ff0000";
    erreurs.push("L'avis doit être renseigné");
    donneesManqantes = true;
  }

  if (donneesManqantes) {
    let message = "<p>Le formulaire n'est pas valide<br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs").innerHTML = message;
  } else {
    const formData = new FormData(form); // Create a FormData object with the form data

    fetch("/php/data/envoi_avis_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        alert (response.status);
        if (response.ok) {
          // Handle the successful response
          document.getElementById("boutonEnvoyer").style.display= "none";
          document.getElementById("boutonRetour").style.display= "block";
          document.getElementById("formulaire_erreurs").innerHTML = "Le formulaire a été envoyée";
          alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs").innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
          alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs").innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
        alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
