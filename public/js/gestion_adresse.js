function resetErreurFormulaire() {
  document.getElementById("adresse_rue1").style.backgroundColor = "";
  document.getElementById("adresse_rue2").style.backgroundColor = "";
  document.getElementById("code_postal").style.backgroundColor = "";
  document.getElementById("ville").style.backgroundColor = "";
  document.getElementById("telephone").style.backgroundColor = "";
}

const form = document.getElementById("adresse_form");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // Evite la soumission par défaut du formulaire
  resetErreurFormulaire(); // Remet le fond des champs du formulaire à leur couleur par défaut
  let erreurs = [];

  // Valide les données saisies
  let donneesManqantes = false;
  if (form["adresse_rue1"].value === "") {
    document.getElementById("adresse_rue1").style.backgroundColor = "#ff0000";
    erreurs.push("La ligne d'adresse 1 doit être renseignée");
    donneesManqantes = true;
  }
  if (form["code_postal"].value === "") {
    document.getElementById("code_postal").style.backgroundColor = "#ff0000";
    erreurs.push("Le code postal doit être renseigné");
    donneesManqantes = true;
  }
  if (form["ville"].value === "") {
    document.getElementById("ville").style.backgroundColor = "#ff0000";
    erreurs.push("La ville doit être renseignée");
    donneesManqantes = true;
  }
  if (form["telephone"].value === "") {
    document.getElementById("telephone").style.backgroundColor = "#ff0000";
    erreurs.push("Le téléphone doit être renseigné");
    donneesManqantes = true;
  }

  if (donneesManqantes) {
    let message = "<p>Cpomplétez les données manquantes de l'adresse : <br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs").innerHTML = message;
  } else {
    const formData = new FormData(form); // Create a FormData object with the form data

    fetch("/php/data/modifier_adresse_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // alert (response.status);
        // alert (JSON.stringify(response.body));
        if (response.ok) {
          // Handle the successful response
          document.getElementById("formulaire_erreurs_adresse").innerHTML = "L'adresse a été modifiée";
          // alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs_adresse").innerHTML = "Impossible de modifier l'adresse - Réessayer ulétrieurement<br/>";
          // alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs_adresse").innerHTML = "Impossible de modifier l'adresse - Réessayer ulétrieurement<br/>";
        // alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
