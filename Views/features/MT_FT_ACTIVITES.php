<?php require "Views/required_files/configs/DefaultsConfigs.php"?>
<!DOCTYPE html>
<html lang="en">
<?php 
 require "Views/required_files/includes/head.php";          
?> 
  <body>
  <!-- Pre-loader start -->
  <?php
    //require  "Views/required_files/includes/Custom_includes/Preloads.php"
 ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <?php require "Views/required_files/includes/header.php"; ?>          
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">              
              <?php require "Views/required_files/includes/sidebar.php"; ?>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <?php 
                      $param1="ACTIVITES";
                      $param2="Admin";
                      $param3="Confinguration du projet";                      
                      $MT_Headers->ContextualHeader($param1,"$param2/$param3");
                      ?>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <?php 
                                           
                                            $query=$MT_QueryInterface->limit_Get("volets", array("id_volet"=>10));
                                            $volets = $MT_QueryInterface->fetched_datas;
                                            $keyValueArray = array();                                            
                                            foreach ($volets as $datas) :
                                                $keyValueArray[$datas["id_volet"]] = $datas["designation"];
                                            endforeach;
                                            $MT_FORMULAIRES->MT_StandardFormsV1("config_activites","Nouvelle activité",
                                                array(
                                                    array("text","designation","Nom du volet","","designation_feedback",""),
                                                    array("text","description","Informations supplémentaires sur ce volet","","description_feedback",""),
                                                    array("select","choix_1","Appartient au volet",$keyValueArray,"d-none","required"),
                                                    array("select","choix_2","volet 2 (si nécessaire)",$keyValueArray,"d-none",0),
                                                    array("select","choix_3","volet 3 (si nécessaire)",$keyValueArray,"d-none",0),
                                                    array("select","choix_4","volet 4 (si nécessaire)",$keyValueArray,"d-none",0),
                                                ),
                                                array("id_SubmitClick",
                                                       "Enregistrer",
                                                       "id_addactivites",
                                                       "conf-activites",
                                                       "Ajouter une autre activité"));                                            
                                        ?>
                                    </div>

                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Required Jquery -->
    <?php require "Views/required_files/includes/Custom_includes/javascriptIncusions.php";?>
    <script>  
    // Appel de la fonction lors du chargement du document
    $(document).ready(function() {
    var config = {
    buttonId: "id_SubmitClick",
    inputElements: [
        { id: '#designation', feedbackLabel: '#designation_feedback', errorMessage: 'Designation must be at least 3 characters' },
        { id: '#description', feedbackLabel: '#description_feedback', errorMessage: 'Description must be at least 5 characters' },
    
    ],
    validationRules: {
        '#designation': function(value) { return value && value.length >= 3; },
        '#description': function(value) { return value && value.length >= 5; },
        // Ajoutez d'autres règles de validation au besoin
    }
    };
    handleSubmitButtonState(config);
    Form_submition("#config_activites","id_SubmitClick", "progress","id_addactivites");
    });

    </script>

    
</body>

</html>
