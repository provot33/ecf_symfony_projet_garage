function resetErreurFormulaireAdresse() {
  document.getElementById("horaire_debut_plage").style.backgroundColor = "";
  document.getElementById("horaire_fin_plage").style.backgroundColor = "";
}

const formPlageHoraire = document.getElementById("plage_horaire_form");

formPlageHoraire.addEventListener("submit", (event) => {
  event.preventDefault(); // Evite la soumission par défaut du formulaire
  resetErreurFormulaireAdresse(); // Remet le fond des champs du formulaire à leur couleur par défaut
  let erreurs = [];

  // Valide les données saisies
  let donneesManqantes = false;
  if (formPlageHoraire["horaire_debut_plage"].value === "") {
    document.getElementById("horaire_debut_plage").style.backgroundColor = "#ff0000";
    erreurs.push("Le début de plage horaire doit être renseigné");
    donneesManqantes = true;
  }
  if (formPlageHoraire["horaire_fin_plage"].value === "") {
    document.getElementById("horaire_fin_plage").style.backgroundColor = "#ff0000";
    erreurs.push("La fin de plage horaire doit être renseignée");
    donneesManqantes = true;
  }

  if (donneesManqantes) {
    let message = "<p>Cpomplétez les données manquantes de l'adresse : <br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs_plage_horaire").innerHTML = message;
  } else {
    const formData = new FormData(formPlageHoraire); // Create a FormData object with the form data

    fetch("/php/data/ajouter_plage_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // alert (response.status);
        // alert (JSON.stringify(response.body));
        if (response.ok) {
          // Handle the successful response
          document.getElementById("formulaire_erreurs_plage_horaire").innerHTML = "La plage horaire a été ajoutée";
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          window.location = window.location.href;
          // alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs_plage_horaire").innerHTML = "Impossible d'ajouter la plage horaire - Réessayer ulétrieurement<br/>";
          // alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs_plage_horaire").innerHTML = "Impossible d'ajouter la plage horaire - Réessayer ulétrieurement<br/>";
        // alert("Reponse Erreur !");
        // Handle the error
      });
  }
});

const formGestionHoraire = document.getElementById("gestion_horaire_form");

formGestionHoraire.addEventListener("submit", (event) => {
  event.preventDefault(); // Evite la soumission par défaut du formulaire
  // resetErreurFormulaireAdresse(); // Remet le fond des champs du formulaire à leur couleur par défaut
  let erreurs = [];

  // Valide les données saisies
  let donneesManqantes = false;
  // if (formGestionHoraire["horaire_debut_plage"].value === "") {
  //   document.getElementById("horaire_debut_plage").style.backgroundColor = "#ff0000";
  //   erreurs.push("Le début de plage horaire doit être renseigné");
  //   donneesManqantes = true;
  // }
  // if (formGestionHoraire["horaire_fin_plage"].value === "") {
  //   document.getElementById("horaire_fin_plage").style.backgroundColor = "#ff0000";
  //   erreurs.push("La fin de plage horaire doit être renseignée");
  //   donneesManqantes = true;
  // }

  if (donneesManqantes) {
    let message = "<p>Cpomplétez les données manquantes de l'adresse : <br /><ul>";
    erreurs.forEach((element) => {
      message += "<li>" + element + "</li>";
    });
    message += "</ul></p>";
    document.getElementById("formulaire_erreurs_horaire").innerHTML = message;
  } else {

    //const formData = new FormData(formGestionHoraire); // Create a FormData object with the form data
    const formData = new FormData();

    myData = document.getElementById("table_horaires").rows
    //console.log(myData)
    //document.getElementById("table_horaires").rows[i].cells[n].children[0].value;
    my_liste = []
    for (var i = 1; i < myData.length; i++) {
            el = myData[i].children
            my_el = [];
            // Ajout de l'Id du Jour
            // my_el.push(el[0].innerText);
            my_el['Identifiant'] = el[0].innerText;
            formData.append(el[1].innerText+'_Identifiant', el[0].innerText);
            // Ajout du Jour
            // my_el.push(el[1].innerText);
            my_el['Jour'] = el[1].innerText;
            //formData.append('Jour'+i, el[1].innerText);
            //my_el.push(el[2].children[0].checked);
            my_el['Est_Ouvert'] = el[2].children[0].checked;
            formData.append(el[1].innerText+'_Est_Ouvert', el[2].children[0].checked);
            // my_el.push(el[3].children[0].value);
            my_el['Plage_1'] = el[3].children[0].value;
            formData.append(el[1].innerText+'_Plage_1', el[3].children[0].value);
            // my_el.push(el[4].children[0].value);
            my_el['Plage_2'] = el[4].children[0].value;
            formData.append(el[1].innerText+'_Plage_2', el[4].children[0].value);
            
            //my_liste.push(my_el)
    }

    //alert(my_liste);
   
    fetch("/php/data/gestion_horaire_db.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // alert (response.status);
        // alert (JSON.stringify(response.body));
        if (response.ok) {
          // Handle the successful response
          document.getElementById("formulaire_erreurs_horaire").innerHTML = "Les horaires ont été mis à jour";
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          window.location = window.location.href;
          // alert("Reponse OK !");
        } else {
          document.getElementById("formulaire_erreurs_horaire").innerHTML = "Impossible de mettre les horaires à jour - Réessayer ulétrieurement<br/>";
          // alert("Reponse KO !");
          // Handle the error
        }
      })
      .catch((error) => {
        document.getElementById("formulaire_erreurs_horaire").innerHTML = "Impossible de mettre les horaires à jour - Réessayer ulétrieurement<br/>";
        // alert("Reponse Erreur !");
        // Handle the error
      });
  }
});
