<?php
require "Views/required_files/configs/DefaultsConfigs.php";     
// background-image:url("Views/applets/assets/images/pdis.webp");
// background-repeat:no-repeat; background-size:container;


if(isset($_GET["conf_taged_action"])){
    $page_action=$_GET["conf_taged_action"];
 if($page_action=="config_volets_new" || $page_action=="new"){
    /**
 * add
 *
 * @param  mixed $relais_classe_formulaires
 * @return void
*/
     /* *****************
    informations sur les champs
    *****************
    */
    $query=$MT_QueryInterface->limit_Get("volets", array("id_volet"=>100));
    $volets = $MT_QueryInterface->fetched_datas;
    $usable_data = array();                                            
    foreach ($volets as $datas) :
        $usable_data[$datas["id_volet"]] = $datas["designation"];
    endforeach;    
    $input_design = array(
        array("type"=>"text",
              "id"=>"designation",
              "titre"=>"Nom du poste",
              "data"=>"",
              "tag"=>"",
              "id_feedback"=>"designation_feedback",
              "condition"=>"value && value.length >= 3",
              "retour"=>"Designation must be at least 3 characters"),
        array("type"=>"text",
              "id"=>"description",
              "titre"=>"Description du poste",
              "value"=>"",
              "tag"=>"",
              "data"=>"",
              "id_feedback"=>"description_feedback",
              "condition"=>"value && value.length >= 5",
              "retour"=>"Description must be at least 5 characters")
    );
    $form_controler = array($input_design,
               "action_name_and_id_form"=>"conf_roles",               
               "titre_du_formulaire"=>"Ajouter les postes",
               "nom_bouton"=>"enregistrer",
               "id_formulaire"=>"id_SubmitClick",
               "progression"=>"progress",
               "id_action_addionnelle"=>"id_other_action",
               "href_etape_suivante"=>array("taged_page"=>"add",array("conf_taged_action"=>"config_volets_new")),
               "etape_suivante"=>"ajouter un autre volet");    
    /*
    *****************
    CONTROLLEUR AJAX
    *****************
    */
    $MT_NewPage->Model_pagesv1($MT_Headers,"add",$MT_FORMULAIRES,$form_controler,"ajaxcoller_r");
       /*
    *****************
    CONTROLLEUR AJAX
    *****************
    */
}
elseif($page_action=="remonter-les-données-d-une-activité"){
       /**
 * add
 *
 * @param  mixed $relais_classe_formulaires
 * @return void
*/
     /* *****************
    informations sur les champs
    *****************
    */
    $query1=$MT_QueryInterface->limit_Get("volets", array("id_volet"=>100));
    $volets = $MT_QueryInterface->fetched_datas;
    $all_volets= array();  
    // ------------------
    $query2=$MT_QueryInterface->limit_Get("activites", array("id_activite"=>100));
    $activites = $MT_QueryInterface->fetched_datas;
    $all_activites = array(); 
    // ------------------                                         
    foreach ($volets as $datas) :
            $all_volets[$datas["id_volet"]] = $datas["designation"];
    endforeach;   
        // ------------------                                         
        foreach ($activites as $datas) :
            $all_activites[$datas["id_activite"]] = $datas["designation"];
        endforeach; 
    $input_design = array(
        array("type"=>"text",
              "id"=>"theme",
              "titre"=>"thème de l'activité",
              "data"=>"",
              "tag"=>"",
              "id_feedback"=>"theme_feedback",
              "condition"=>"value && value.length >= 3",
              "retour"=>"Designation must be at least 3 characters"),
              array("type"=>"select",
              "id"=>"theme",
              "titre"=>"thème de l'activité",
              "data"=>$all_activites,
              "tag"=>"",
              "id_feedback"=>"type_activite_feedback",
              "condition"=>"value.selectedIndex !== -1",
              "retour"=>"vous devez éffectuer un choix"),
    );
    $form_controler = array($input_design,
               "action_name_and_id_form"=>"action_add_activite",               
               "titre_du_formulaire"=>"Ajouter les postes",
               "nom_bouton"=>"enregistrer",
               "id_formulaire"=>"id_SubmitClick",
               "progression"=>"progress",
               "id_action_addionnelle"=>"id_other_action",
               "href_etape_suivante"=>array("taged_page"=>"add",array("conf_taged_action"=>"remonter-les-données-d-une-activité")),
               "etape_suivante"=>"ajouter un autre volet");    
    /*
    *****************
    CONTROLLEUR AJAX
    *****************
    */
    $MT_NewPage->Model_pagesv1($MT_Headers,"add",$MT_FORMULAIRES,$form_controler,"ajaxcoller_r");
       /*
    *****************
    CONTROLLEUR AJAX
    *****************
    */
}
}
else{
    echo "erreur inconu";
}

