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
                      $role="structures";
                      $localité="BWEREMANA";
                      $volet="MASCULINITE POSITIVE";
                      $MT_Headers->ContextualHeader($role,"$localité/$volet");

                      ?>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <?php 
                                            $query=$MT_QueryInterface->limit_Get("localites", array("id_localite"=>100));
                                            $volets = $MT_QueryInterface->fetched_datas;
                                            $keyValueArray = array();                                            
                                            foreach ($volets as $datas) :
                                                $keyValueArray[$datas["id_localite"]] = $datas["designation"];
                                            endforeach;
                                            $MT_FORMULAIRES->MT_StandardFormsV1("conf_structure","Ajouter une structure",
                                                array(
                                                    array("text","designation","Nom de la structure","","designation_feedback"),
                                                    array("select","choix","La structure se situe dans quelle localité",$keyValueArray,"d-none","required"),
                                                    array("text","description","Informations supplémentaires sur la structure","","description_feedback"),
                                                ),
                                                array("id_SubmitClick",
                                                       "Enregistrer",
                                                       "id_addactivites",
                                                       "conf-structures",
                                                       "Une autre structure"));                                            
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
        { id: '#description', feedbackLabel: '#description_feedback', errorMessage: 'Description must be at least 5 characters' },    ],
    validationRules: {
        '#designation': function(value) { return value && value.length >= 3; },
        '#description': function(value) { return value && value.length >= 5; },
        // Ajoutez d'autres règles de validation au besoin
    }
    };
    handleSubmitButtonState(config);
    Form_submition("#conf_structure","id_SubmitClick", "progress","id_addactivites");
    });

    </script>

    
</body>

</html>