// document
//   .querySelectorAll('[data-tiny-editor]')
//   .forEach(editor =>
//     editor.addEventListener('input', e => console.log(e.target.innerHTML)
//   )
// );

document
  .getElementById("cancelSection1")
  .addEventListener("click", rechargeSection1);
document
  .getElementById("updateSection1")
  .addEventListener("click", enregistreSection1);
function rechargeSection1(){rechargeSection('section1');}
function enregistreSection1(){enregistreSection('section1');}
    
document
  .getElementById("cancelSection2")
  .addEventListener("click", rechargeSection2);
document
  .getElementById("updateSection2")
  .addEventListener("click", enregistreSection2);
function rechargeSection2(){rechargeSection('section2');}
function enregistreSection2(){enregistreSection('section2');}
    
document
  .getElementById("cancelSection3")
  .addEventListener("click", rechargeSection3);
document
  .getElementById("updateSection3")
  .addEventListener("click", enregistreSection3);
function rechargeSection3(){rechargeSection('section3');}
function enregistreSection3(){enregistreSection('section3');}
    

function rechargeSection(section) {
    // alert("On recharge la section : " + section);

    fetch('/php/data/gestion_contenu_db.php?' + new URLSearchParams({section: section}).toString())
        .then((response) => {
            if(!response.ok){ 
                // Before parsing (i.e. decoding) the JSON data,              
                // check for any errors.
                // In case of an error, throw.
                throw new Error("Something went wrong!");
            }

            return response.json(); 
        })
        .then((data) => {
            //  alert(data);
             document.getElementById(section).innerHTML = data;
        })
        .catch((error) => {
             // This is where you handle errors.
        });
}

function enregistreSection(section) {
    // alert("On veut envoyer le contenu de l'éditeur en base.");
    let formData = new FormData();
    // document
    //     .querySelectorAll('[data-tiny-editor]')
    //     .forEach(editor => {
    //         alert(editor.innerHTML);
    //     }
    // );
    let contenuSection = document.getElementById(section).innerHTML;

    formData.append(section, contenuSection);

    // alert("Fetch de la ressource avec le formulaire : " + detailForm);
    fetch('/php/data/gestion_contenu_db.php', {
    method: "POST",
    body: formData,
    })
    .then((response) => {
        // console.log("success!", response);
        if (response.ok) {
        // Lance un rechargement de la page pour mettre les données à jour
        // notamment en cas de DELETE CASCADE imposée par une suppression
        //location.reload();
        // alert("Reponse OK !");
        } else {
        // document.getElementById("formulaire_erreurs_adresse").innerHTML = "Impossible de modifier l'adresse - Réessayer ulétrieurement<br/>";
        // alert("Reponse KO !");
        // Handle the error
        }
    })
    .catch((error) => {
    //   alert("Reponse Erreur !");
        // Handle the error
    });        
}