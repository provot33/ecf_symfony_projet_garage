function resetErreurFormulaire() {
  document.getElementById("nom").style.backgroundColor = "";
  document.getElementById("prenom").style.backgroundColor = "";
  document.getElementById("email").style.backgroundColor = "";
  document.getElementById("password").style.backgroundColor = "";
}

const form = document.getElementById("personnel_form");

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
  if (form["password"].value === "") {
    document.getElementById("password").style.backgroundColor = "#ff0000";
    erreurs.push("Le mot de passe doit être renseigné");
    donneesManqantes = true;
  }

  if (donneesManqantes) {
    let message = "<p>Cpomplétez les données manquantes du salarié : <br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs").innerHTML = message;
  } else {
    const formData = new FormData(form); // Create a FormData object with the form data

    fetch("/php/data/creation_compte_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // alert (response.status);
        // alert (JSON.stringify(response.body));
        if (response.ok) {
          // Handle the successful response
          document.getElementById("nom").value = "";
          document.getElementById("prenom").value = "";
          document.getElementById("email").value = "";
          document.getElementById("password").value = "";
          document.getElementById("formulaire_erreurs").innerHTML = "Le salarié a été créé";
          // alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs").innerHTML = "Impossible de créer le salarié - Réessayer ulétrieurement<br/>";
          // alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs").innerHTML = "Impossible de créer le salarié - Réessayer ulétrieurement<br/>";
        // alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
