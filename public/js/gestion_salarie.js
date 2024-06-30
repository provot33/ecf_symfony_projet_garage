const messageDonnees = "Renseignez les données obligatoires";
const messageMotDePasse = "Le mot de passe doit faire entre 6 et 22 caractères";
const messageFormat = "Verifiez le format des données en erreur";

// RegExp pour le password très strict : (doit avoir minuscule, majuscule, chiffre et caractères spéciaux,
// entre 6 et 22 chars)
// const regexPassword =
//   /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&;,_çéèàùµ£\<\>\|\\\/\^\+\-\ ])[A-Za-z\d@.#$!%*?&;,_çéèàùµ£\<\>\|\\\/\^\+\-\ ]{6,22}$/;
const regexCourriel =
  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,3}))$/;
const regexPassword =/^[a-zA-Z\d@.#$!%*?&;,_çéèàùµ£\<\>\|\\\/\^\+\-\ ]{6,22}$/;  
const regexName = /^[a-zA-Z\- ]{2,30}$/;


function validate(valeur, regex) {
  return regex.test(valeur);
}

function validateValeur(valeur, type) {
  let donneeOk = false;
  // alert("Teste le type " + type);
  switch (type) {
    case "Pwd_":
      donneeOk = validate(valeur, regexPassword);
      break;
    case "Email_":
      donneeOk = validate(valeur, regexCourriel);
      break;
    case "Admin_":
      donneeOk = true;
      break;
    default:
      donneeOk = validate(valeur, regexName);
      break;
  }
  return donneeOk;
}

document
  .getElementById("personnelAdd")
  .addEventListener("click", addPersonnelLine);
document
  .getElementById("personnelUpdate")
  .addEventListener("click", updatePersonnelTable);

function addPersonnelLine() {
  addLine(
    "personnel-list",
    [
      "personnelName_",
      "personnelFirstname_",
      "personnelEmail_",
      "personnelPwd_",
      "personnelAdmin_",
    ],
    ["text", "text", "text", "text", "checkbox"],
    "personnelSuppr_"
  );
}
function updatePersonnelTable() {
  updateComplexTable(
    "/php/data/creation_compte_db.php",
    "personnel-list",
    [
      "personnelName_",
      "personnelFirstname_",
      "personnelEmail_",
      "personnelPwd_",
      "personnelAdmin_",
    ],
    ["text", "text", "text", "text", "checkbox"],
    "personnelSuppr_"
  );
}

function addLine(nomListe, params, type, nomSupression) {
  let tbodyRef = document
    .getElementById(nomListe)
    .getElementsByTagName("tbody")[0];
  let nbLine = tbodyRef.rows.length;

  // Insert a row at the end of table
  let newRow = tbodyRef.insertRow();

  let pkCell = newRow.insertCell();
  pkCell.style = "display:none;";
  pkCell.innerHTML = "À définir";

  for (let i = 0; i < params.length; i++) {
    let refCell = newRow.insertCell();
    refCell.style = "display:none;";
    refCell.className = "td_data";
    let inputCell = newRow.insertCell();
    inputCell.className = "td_data";
    inputCell.innerHTML =
      '<input type="' +
      type[i] +
      '" id="' +
      params[i] +
      nbLine +
      '" name="' +
      params[i] +
      nbLine +
      (type[i] === "text" ? '" value="" />' : '" />');
  }

  let suppressCell = newRow.insertCell();
  suppressCell.className = "td_data";
  suppressCell.innerHTML =
    '<input type="checkbox" id="' +
    nomSupression +
    nbLine +
    '" name="' +
    nomSupression +
    nbLine +
    '" />';
}

function ligneModifiee(cells, params, type, numLigne) {
  let difference = false;

  let j = 0;
  const nbElements = params.length * 2;
  for (let i = 1; i < nbElements && !difference; i = i + 2) {
    let reference;
    let value;
    switch (type[j]) {
      case "text":
        reference = cells.item(i).innerHTML;
        value = document.getElementById(params[j] + numLigne).value;
        if (reference !== value) {
          // alert ("Différence repérée : " + reference + " != " + value);
          difference = true;
        }
        break;
      case "checkbox":
        reference = cells.item(i).innerHTML.includes("checked");
        value = document.getElementById(params[j] + numLigne).checked;
        // alert ("Reference " + reference + " et Value " + value);
        if ((reference && !value) || (!reference && value)) {
          // alert ("Différence repérée : " + reference + " != " + value);
          difference = true;
        }
        break;
    }
    j++;
    if (reference !== value) {
      // alert ("Différence repérée : " + reference + " != " + value);
      difference = true;
    }
  }

  return difference;
}

function updateComplexTable(ressource, nomListe, params, type, nomSupression) {
  // alert(
  //   "+Traite les lignes pour définir les ordres SQL (Update/delete/insert)"
  // );
  let erreurPresente = false;
  let donneeObligatoireOublie = false;
  let donneeMalRenseignee = false;
  let donneeMotDePasseIncohérente = false;
  let ligneVideASupprimer = [];
  let idASupprimer = [];
  let ligneAAjouter = [];
  let ligneAModifier = [];
  let tbodyRef = document
    .getElementById(nomListe)
    .getElementsByTagName("tbody")[0];
  let nbLine = tbodyRef.rows.length;
  document.getElementById("formulaire_erreurs").innerHTML = "";
  for (let i = 0; i < nbLine; i++) {
    //gets cells of current row
    let cells = tbodyRef.rows.item(i).cells;
    const aSupprimer = document.getElementById(nomSupression + i).checked;
    if (cells.item(0).innerHTML.includes("À définir") && aSupprimer) {
      // alert("On veut supprimer la ligne vide");
      ligneVideASupprimer.push(i);
    } else if (cells.item(0).innerHTML.includes("À définir") && !aSupprimer) {
      // alert ('Ligne '+i+' est une nouvelle ligne : vérifier les champs saisi');
      let ligneDonnees = "";
      let elementsAjoutes = 0;
      for (let j = 0; j < params.length; j++) {
        // alert('On traite le paramètre ' + params[j]);
        let valeur = "";
        switch (type[j]) {
          case "text":
            valeur = document.getElementById(params[j] + i).value;
            break;
          case "checkbox":
            valeur = document.getElementById(params[j] + i).checked ? "1" : "0";
            break;
        }
        // alert('Paramètre ' + params[j] + ' de type ' + type[j] + ' vaut ' + valeur);
        if (valeur) {
          //   alert ('Ligne '+i+' à ajouter : valeur ' + valeur);
          // Vérifie la qualité de la donnée
          if (validateValeur(valeur, params[j].substring(9))) {
            ligneDonnees +=
              (j !== 0 ? "," : "{") + '"' + [params[j]] + '": "' + valeur + '"';
            // ligneDonnees.push({valeur});
            document.getElementById(params[j] + i).style.backgroundColor = "";
            elementsAjoutes++;
          } else {
            // alert("Donnée " + params[j] + i + " est invalide");
            document.getElementById(params[j] + i).style.backgroundColor =
              "#ff0000";
            erreurPresente = true;
            if (params[j].substring(9) != "Pwd_") {
              donneeMalRenseignee = true;
            } else {
              donneeMotDePasseIncohérente = true;
            }
            
          }
        } else {
          document.getElementById(params[j] + i).style.backgroundColor =
            "#ff0000";
          erreurPresente = true;
          donneeObligatoireOublie = true;
          // alert ('Ligne '+i+' est vide. On doit remonter une erreur');
        }
      }
      if (elementsAjoutes !== params.length) {
        // alert("Exception !!\n"+elementsAjoutes+" VS "+params.length);
        // for (let j = 0; j < params.length; j++) {
        //   alert('On parcours la ligneCréée : '+j+' = ' + ligneDonnees[params[j]]);
        // }
        // Gérer les erreurs.
        erreurPresente = true;
        donneeObligatoireOublie = true;
      }
      ligneDonnees += "}";
      ligneAAjouter.push('"elem' + i + '": ' + ligneDonnees);
      // let ligneString = "";

      // ligneDonnees.forEach(function(entry) {
      //   ligneString += entry;
      // });
      // alert("Ligne Données ajoutés " + ligneDonnees);
      // alert("Lignes à ajouter " + ligneAAjouter);
      // ligneAAjouter.forEach(function(item) {
      //   Object.keys(item).forEach(function(key) {
      //     alert("ligneAAjouter key:" + key + "value:" + item[key]);
      //   });
      // });
    } else if (aSupprimer && !cells.item(0).innerHTML.includes("À définir")) {
      // alert(
      //   "Ligne " + i + " à supprimer. Valeur de clé " + cells.item(0).innerHTML
      // );
      idASupprimer.push(cells.item(0).innerHTML);
    } else if (ligneModifiee(cells, params, type, i)) {
      let ligneDonnees = "";
      let elementsValorises = 0;
      for (let j = 0; j < params.length; j++) {
        // alert("On traite le paramètre " + params[j]);
        let valeur = "";
        switch (type[j]) {
          case "text":
            valeur = document.getElementById(params[j] + i).value;
            break;
          case "checkbox":
            valeur = document.getElementById(params[j] + i).checked ? "1" : "0";
            break;
        }
        // alert("qui a pour valeur " + valeur);
        if (valeur) {
          //   alert ('Ligne '+i+' à ajouter : valeur ' + valeur);
          // Vérifie la qualité de la donnée
          if (validateValeur(valeur, params[j].substring(9))) {
            ligneDonnees +=
              (j !== 0 ? "," : "{") + '"' + [params[j]] + '": "' + valeur + '"';
            // ligneDonnees.push({valeur});
            document.getElementById(params[j] + i).style.backgroundColor = "";
            elementsValorises++;
          } else {
            // alert("Donnée " + params[j] + i + " est invalide");
            // Cas particulier du mot de passe qu'on peut ne pas mettre à jour
            if (params[j].substring(9) != "Pwd_" || valeur != "") {
              document.getElementById(params[j] + i).style.backgroundColor =
                "#ff0000";
              erreurPresente = true;
              donneeMalRenseignee = true;
            }
            if (params[j].substring(9) != "Pwd_" && valeur != "") {
              document.getElementById(params[j] + i).style.backgroundColor =
                "#ff0000";
              erreurPresente = true;
              donneeMotDePasseIncohérente = true;
            }
          }
        } else {
          if (params[j].substring(9) != "Pwd_") {
            document.getElementById(params[j] + i).style.backgroundColor =
              "#ff0000";
            erreurPresente = true;
            donneeObligatoireOublie = true;
            // alert ('Ligne '+i+' est vide. On doit remonter une erreur');
          }
        }
      }
      if (elementsValorises !== params.length) {
        // Cas particuliers de la table Administrator qui contient un mot de passe
        // alert("D'après le test : \n " + elementsValorises +"+1 === " + params.length + " vaut " + (elementsValorises+1 === params.length?"TRUE":"FALSE")
        // + "\n && " + params[3] + "=== administratorPwd_ vaut " + (params[3] === "administratorPwd_"?"TRUE":"FALSE")
        // + "\n && document.getElementById(administratorPwd_" + i + ").value === \"\" vaut " + (document.getElementById("administratorPwd_" + i).value === ""?"TRUE":"FALSE"));
        // alert("Donc le test vaut " + (!(elementsValorises+1 === params.length && params[3] === "administratorPwd_" && document.getElementById("administratorPwd_" + i).value === "")?"TRUE":"FALSE"));
        if (
          !(
            elementsValorises + 1 === params.length &&
            params[3] === "personnelPwd_" &&
            document.getElementById("personnelPwd_" + i).value === ""
          )
        ) {
          // alert("Exception !!\n"+elementsValorises+" VS "+params.length);
          // for (let j = 0; j < params.length; j++) {
          //   alert('On parcours la ligneCréee : '+j+' = ' + ligneDonnees[params[j]]);
          // }
          // Gérer les erreurs.
          erreurPresente = true;
          donneeObligatoireOublie = true;
        }
      }
      ligneDonnees += ', "personnelId_": "' + cells.item(0).innerHTML + '"}';
      ligneAModifier.push('"elem' + i + '": ' + ligneDonnees);

      //   if (valeur) {
      //     ligneAModifier.push(
      //       '{"' + cells.item(0).innerHTML + '":"' + valeur + '"}'
      //     );
      //   }
      // }
    }
  }

  // alert("Lignes à supprimer " + ligneVideASupprimer.length);
  if (ligneVideASupprimer.length > 0) {
    for (let i = ligneVideASupprimer.length - 1; i >= 0; i--) {
      // alert("On supprime la ligne " + ligneVideASupprimer[i] + "de la table ")
      tbodyRef.deleteRow(ligneVideASupprimer[i]);
    }
  }

  if (
    ligneAAjouter.length !== 0 ||
    idASupprimer.length !== 0 ||
    ligneAModifier.length !== 0
  ) {
    // alert("Mise à jour des tables - appel backOffice");
    // alert(
    //   "Données envoyés \n" +
    //     "\nElements ajoués : " +
    //     ligneAAjouter.length +
    //     "\nElements supprimés : " +
    //     idASupprimer.length +
    //     "\nElements modifiés : " +
    //     ligneAModifier.length
    // );

    // const formMission = document.getElementById("typeMission");
    let formData = new FormData();
    formData.append("ajout", "{" + ligneAAjouter + "}");
    formData.append("suppression", idASupprimer);
    formData.append("modification", "{" + ligneAModifier + "}");

    let detailForm = "";
    for (var key in formData) {
      detailForm += "\nclé " + key + " a pour valeur " + formData[key];
    }
    if (!erreurPresente) {
      // alert("Fetch de la ressource avec le formulaire : " + detailForm);
      fetch(ressource, {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          // console.log("success!", response);
          if (response.ok) {
            // Lance un rechargement de la page pour mettre les données à jour
            // notamment en cas de DELETE CASCADE imposée par une suppression
            location.reload();
            // alert("Reponse OK !");
          } else {
            // document.getElementById("formulaire_erreurs_adresse").innerHTML = "Impossible de modifier l'adresse - Réessayer ulétrieurement<br/>";
            alert("Reponse KO !");
            // Handle the error
          }
        })
        .catch((error) => {
          alert("Reponse Erreur !");
          // Handle the error
        });
    } else {
      let erreurs = "Il y a des erreurs :";
      if (donneeObligatoireOublie) {
        erreurs += "<br />"+messageDonnees;
      }
      if (donneeMalRenseignee) {
        erreurs += "<br />"+messageFormat;
      }
      if (donneeMotDePasseIncohérente){
        erreurs += "<br />"+messageMotDePasse;
      }
      document.getElementById("formulaire_erreurs").innerHTML = erreurs;
    }
  }
}
