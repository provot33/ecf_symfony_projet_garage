<?php
function arrayToSelect($option, $selected = '')
{
    $returnStatement = '<select>';

    if ($selected == '') {
        $returnStatement .= '<option value="0" selected="selected"> --- </option>';
    } else {
        $returnStatement .= '<option value="0"> --- </option>';
    }

    foreach ($option as $key => $value) {
        if ($key == $selected) {
            $returnStatement .= '<option selected="selected" value="' . $key . '">' . $value . '</option>';
        } else {
            $returnStatement .= '<option value="' . $key . '">' . $value . '</option>';
        }
    }

    $returnStatement .= '</select>';
    return $returnStatement;
}

function alimenteCommentaires($number, $nom, $prenom, $courriel, $note, $avis, $est_valide, $admin = false, $identifiant = 0) {
    $commentaire = '';
    if ($est_valide || $admin){
        
        $commentaire = '<fieldset>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="nom'.$number.'">Nom : </label>
                </div>
                <div class="formulaire_champ div_gauche">
                    '.$nom.'
                </div>
            </div>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="prenom'.$number.'">Prenom : </label>
                </div>
                <div class="formulaire_champ div_gauche">
                    '.$prenom.'
                </div>
            </div>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="courriel'.$number.'"><i class="bi bi-envelope-fill"></i></label>
                </div>
                <div class="formulaire_champ div_gauche">
                    '.($admin ? $courriel : strtok($courriel, '@').'@****').
                '</div>
            </div>';
        $commentaire .= '<div class="feedback formulaire_contact div_centre">
            <label class="angry">
            <input type="radio" value="1" name="feedback'.$number.'" '.($note == 1 ? 'checked' : '').' />
            <div>
                <svg class="eye left"><use xlink:href="#eye"></svg>
                <svg class="eye right"><use xlink:href="#eye"></svg>
                <svg class="mouth"><use xlink:href="#mouth"></svg>
            </div>
            </label>
            <label class="sad">
            <input type="radio" value="2" name="feedback'.$number.'" '.($note == 2 ? 'checked' : '').' />
            <div>
                <svg class="eye left"> <use xlink:href="#eye"> </svg>
                <svg class="eye right"> <use xlink:href="#eye"> </svg>
                <svg class="mouth"> <use xlink:href="#mouth"> </svg>
            </div>
            </label>
            <label class="ok">
            <input type="radio" value="3" name="feedback'.$number.'" '.($note == 3 ? 'checked' : '').' />
            <div></div>
            </label>
            <label class="good">
            <input type="radio" value="4" name="feedback'.$number.'" '.($note == 4 ? 'checked' : '').' />
            <div>
                <svg class="eye left"> <use xlink:href="#eye"> </svg>
                <svg class="eye right"> <use xlink:href="#eye"> </svg>
                <svg class="mouth"> <use xlink:href="#mouth"> </svg>
            </div>
            </label>
            <label class="happy">
            <input type="radio" value="5" name="feedback'.$number.'" '.($note == 5 ? 'checked' : '').' />
            <div>
                <svg class="eye left"><use xlink:href="#eye"></svg>
                <svg class="eye right"><use xlink:href="#eye"></svg>
            </div>
            </label>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
                <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
                <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
            </symbol>
        </svg>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <textarea id="avis'.$number.'" rows="10" , cols="34">'.$avis.'</textarea>
            </div>';
        if ($admin) {
            if ($est_valide){
                $commentaire .= '<div class="formulaire_label div_centre">
                        <label for="est_valide'.$number.'">Commentaire validé</label>
                    </div>';
            }
            else {
                $commentaire .= '<div class="formulaire_contact div_centre" id="formulaire_erreurs'.$number.'">

                    </div>
                    <div id="boutonValider'.$number.'" class="div_centre">
                        <button type="submit" onclick="validerCommentaire('.$number.','.$identifiant.')">Valider l\'avis</button>
                    </div>';
            }

        }
        $commentaire .= '</fieldset>';
    }
    return $commentaire;
}

function alimenteAnnonceVehicule($identifiant, $annonce
    //$number, $nom, $prenom, $courriel, $note, $avis, $est_valide, $admin = false, $identifiant = 0
    ) {
    $commentaire = '';
    //if ($est_valide || $admin){
        
        $commentaire = '<fieldset>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="nom'.$identifiant.'">Nom : </label>
                </div>
                <div class="formulaire_champ div_gauche">
                    '.$annonce[''].'
                </div>
            </div>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <div class="formulaire_label div_droite">
                    <label for="prenom'.$identifiant.'">Prenom : </label>
                </div>
                <div class="formulaire_champ div_gauche">
                    '.$annonce[''].'
                </div>
            </div>';
        // $commentaire .= '<div class="formulaire_contact div_centre">
        //         <div class="formulaire_label div_droite">
        //             <label for="courriel'.$identifiant.'"><i class="bi bi-envelope-fill"></i></label>
        //         </div>
        //         <div class="formulaire_champ div_gauche">
        //             '.($admin ? $annonce[''] : strtok($annonce[''], '@').'@****').
        //         '</div>
        //     </div>';
        $commentaire .= '<div class="feedback formulaire_contact div_centre">
            <label class="angry">
            <input type="radio" value="1" name="feedback'.$identifiant.'" '.($annonce[''] == 1 ? 'checked' : '').' />
            <div>
                <svg class="eye left"><use xlink:href="#eye"></svg>
                <svg class="eye right"><use xlink:href="#eye"></svg>
                <svg class="mouth"><use xlink:href="#mouth"></svg>
            </div>
            </label>
            <label class="sad">
            <input type="radio" value="2" name="feedback'.$identifiant.'" '.($annonce[''] == 2 ? 'checked' : '').' />
            <div>
                <svg class="eye left"> <use xlink:href="#eye"> </svg>
                <svg class="eye right"> <use xlink:href="#eye"> </svg>
                <svg class="mouth"> <use xlink:href="#mouth"> </svg>
            </div>
            </label>
            <label class="ok">
            <input type="radio" value="3" name="feedback'.$identifiant.'" '.($annonce[''] == 3 ? 'checked' : '').' />
            <div></div>
            </label>
            <label class="good">
            <input type="radio" value="4" name="feedback'.$identifiant.'" '.($annonce[''] == 4 ? 'checked' : '').' />
            <div>
                <svg class="eye left"> <use xlink:href="#eye"> </svg>
                <svg class="eye right"> <use xlink:href="#eye"> </svg>
                <svg class="mouth"> <use xlink:href="#mouth"> </svg>
            </div>
            </label>
            <label class="happy">
            <input type="radio" value="5" name="feedback'.$identifiant.'" '.($annonce[''] == 5 ? 'checked' : '').' />
            <div>
                <svg class="eye left"><use xlink:href="#eye"></svg>
                <svg class="eye right"><use xlink:href="#eye"></svg>
            </div>
            </label>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
                <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
                <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
            </symbol>
        </svg>';
        $commentaire .= '<div class="formulaire_contact div_centre">
                <textarea id="avis'.$identifiant.'" rows="10" , cols="34">'.$annonce[''].'</textarea>
            </div>';
        // if ($admin) {
        //     if ($est_valide){
        //         $commentaire .= '<div class="formulaire_label div_centre">
        //                 <label for="est_valide'.$identifiant.'">Commentaire validé</label>
        //             </div>';
        //     }
        //     else {
        //         $commentaire .= '<div class="formulaire_contact div_centre" id="formulaire_erreurs'.$identifiant.'">

        //             </div>
        //             <div id="boutonValider'.$identifiant.'" class="div_centre">
        //                 <button type="submit" onclick="validerCommentaire('.$identifiant.','.$identifiant.')">Valider l\'avis</button>
        //             </div>';
        //     }

        // }
        $commentaire .= '</fieldset>';
    // }
    return $commentaire;
}
?>