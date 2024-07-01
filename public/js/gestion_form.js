function resetErreurFormulaire() {
  document.getElementById("nom").style.backgroundColor = "";
  document.getElementById("prenom").style.backgroundColor = "";
  document.getElementById("email").style.backgroundColor = "";
  document.getElementById("telephone").style.backgroundColor = "";
  document.getElementById("message").style.backgroundColor = "";
  document.getElementById("formulaire_erreurs").innerHTML = "";
  document.getElementById("boutonEnvoyer").style.display= "block";
  document.getElementById("boutonRetour").style.display= "none";
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

  // alert ("Objet_contact vaut : " + form['objet_contact'].value);
  form['id_sujet'].value = form['objet_contact'].value;

  if (donneesManqantes) {
    let message = "<p>Le formulaire n'est pas valide<br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs").innerHTML = message;
  } else {
    const formData = new FormData(form); // Create a FormData object with the form data

    fetch("/php/data/demande_contact_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // alert (response.status);
        if (response.ok) {
          // Handle the successful response
          document.getElementById("boutonEnvoyer").style.display= "none";
          document.getElementById("boutonRetour").style.display= "block";
          document.getElementById("formulaire_erreurs").innerHTML = "Le formulaire a été envoyée";
          // alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs").innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
          // alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs").innerHTML = "Impossible de transférer le formulaire - Réessayer ulétrieurement";
        // alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
