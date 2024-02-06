<?php
session_start();

// $_SESSION["session_identification"] ="rapportagetoov1";
// $_SESSION["identifent_ag"] =  $agent["id_agent"];
// $_SESSION["projet"] =  $agent["projet"];
// $_SESSION["nom"] =  $agent["post_nom"];
// $_SESSION["fonction"] =  $agent["fonction"];
// $_SESSION["email"] =  $agent["email"];



// Vérifie si l'utilisateur est déjà connecté
if(isset($_SESSION['loggedin']) === true ) {
} else {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header('location: login');
    exit; // Assurez-vous de terminer le script après la redirection
}
/**
 * substr_customised
 *
 * @param  mixed $str chaine de caractère à afficher 
 * @param  mixed $int nombre de caractère à ne pas de passer
 * @return void
 */
function substr_customised($str,int $int){
    $len=strlen($str);
    if($len >= $int){
      echo substr($str,0,$int); 
          echo "...";
    }
    else
           echo substr($str,0,$int);       
  }
function e_($str){
   echo $str;
}
/**
 * add la fonction genere un fofmulaire d'insertion
 *
 * @param  mixed $relais_classe_formulaires
 * @param  mixed $relais_form_controler
 * @return void
 */
function add($relais_classe_formulaires,$relais_form_controler){
  $relais_classe_formulaires->MT_StandardFormsV2( 
      $relais_form_controler['action_name_and_id_form'],
      $relais_form_controler['titre_du_formulaire'],
      $relais_form_controler[0],
      array("id_SubmitClick",
      $relais_form_controler['nom_bouton'],
      "id_actionadditionnelle"=>$relais_form_controler['id_action_addionnelle'],
      "nom_etape_suivante"=>$relais_form_controler['etape_suivante'],
      "href"=>$relais_form_controler['href_etape_suivante'])); 
  }  
  /**
   * ajaxcoller_r : une fonction qui gere le control ajax
   *
   * @param  mixed $rel_form_controler
   * @return void
   */
  function ajaxcoller_r($rel_form_controler){
    e_('<script>  
      // Appel de la fonction lors du chargement du document
      $(document).ready(function() {
      var config = {
      buttonId: "'.$rel_form_controler['id_formulaire'].'",
      inputElements: [');
      foreach ($rel_form_controler[0] as $feedback) {
           e_(" {id: '#".$feedback['id']."', feedbackLabel: '#".$feedback['id_feedback']."', errorMessage: '".$feedback['retour']."' },
           ");
      }
          e_('
      ],
          validationRules: {');
              foreach ($rel_form_controler[0] as $feedback) {
                  e_(" '#".$feedback['id']."': function(value) { return ".$feedback['condition']."; },
              ");
             }        
      e_('}
      };
      handleSubmitButtonState(config);
      Form_submition("#'.$rel_form_controler['action_name_and_id_form'].'","'.$rel_form_controler['id_formulaire'].'","'.$rel_form_controler['progression'].'","'.$rel_form_controler['id_action_addionnelle'].'");
      });    
      </script>');
  }
  