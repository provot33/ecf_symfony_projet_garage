function resetErreurFormulaire() {
  document.getElementById("nom").style.backgroundColor = "";
  document.getElementById("prenom").style.backgroundColor = "";
  document.getElementById("email").style.backgroundColor = "";
  document.getElementById("telephone").style.backgroundColor = "";
  document.getElementById("message").style.backgroundColor = "";
  document.getElementById("formulaire_erreurs").innerHTML = "";
}

const regExprTelephone = /^0\d{9}$/;

const form = document.getElementById("contact_form");

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
  if (!regExprTelephone.exec(form["telephone"].value)) {
    document.getElementById("telephone").style.backgroundColor = "#ff0000";
    erreurs.push(
      "Le numéro de téléphone doit commencer par 0 et être composé de 10 chiffres"
    );
    donneesManqantes = true;
  }
  if (form["message"].value === "") {
    document.getElementById("message").style.backgroundColor = "#ff0000";
    erreurs.push("Le message doit être renseigné");
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

    fetch("demande_contact.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.ok) {
          alert("Reponse OK !");
          // Handle the successful response
        } else {
          alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
