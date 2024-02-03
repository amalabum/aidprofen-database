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
                      $role="SUPERVISEUR";
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
                                            $MT_FORMULAIRES->MT_StandardFormsV1("config_localite","Ajouter un utilisateur",
                                                array(
                                                    array("text","username","Nom d'utilisateur","","username_feedback"),
                                                    array("password","pass1","Mot de pass","","passord1_feedback"),
                                                    array("password","pass2","Confirmer le mot de pass","","passord2_feedback"),
                                                    
                                                ),
                                                array("id_SubmitClick",
                                                       "Enregistrer",
                                                       "id_addactivites",
                                                       "conf-localites",
                                                       "une autre localité"));                                            
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
        { id: '#username', feedbackLabel: '#username_feedback', errorMessage: 'un nom doit avoir au minimun 5 caractères' },
        { id: '#pass1', feedbackLabel: '#passord1_feedback', errorMessage: 'un mot de pass doit avoir au minimun 5 caractères' },
        { id: '#pass2', feedbackLabel: '#passord2_feedback', errorMessage: 'les mots deux mots de passent doivent correspondre' },
    
    ],
    validationRules: {

        '#username': function(value) { return value && value.length >= 5; },
        '#pass1': function(value) { return value && value.length >= 8; },
        '#pass2': function(value) { return value && value.length >= 8; },
        
    }
    };
    handleSubmitButtonState_for_password(config);
    Form_submition("#config_localite","id_SubmitClick", "progress","id_addactivites");
    });

    </script>

    
</body>

</html>
