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
                                    <div class="row">
                                    <div class="page-body col-6">
                                        <?php 
                                            $list1=array(1=>"kalinga",2=>"katale",3=>"lushagla",4=>"bweremana");                                            
                                            $MT_FORMULAIRES->MT_StandardFormsV1("action_add_activite","Rémonter les données sur une activité",
                                                array(
                                                    array("text","Theme","Thème de leactivité","","theme_feeback",""),
                                                    array("select","Localité","Veuillez choisir une localité",$list1,"localité_feeback",""),
                                                    array("date","DebutActivite","","debut_activite","debutactivite_feeback",""),
                                                    array("date","FinActivite","","fin_activite","finactivite_feeback",""),
                                                    array("number","NombreParticipans","PARTICIPANTS","","participants_feeback","")                                                                
                                            ),array("id_SubmitClick","Enregistrer l'activité","id_addparticipants","ajouterUneactivité","ajouter aussi les partiticapant"));
                                            
                                        ?>
                                    </div>
                                        <div class="page-body col-6">
                                        <?php 
                                            $MT_Tables->MT_StandardTableV2("roles",array('id_role','3','Gérer les utilisateures','user'),
                                            array('designation','designation','action'),
                                            array('Avatars & noms','designation','action'),
                                            array(
                                                array("Reafecter ailleur","conf-hommes-engagés",array("param1"=>"id_item","param2"=>"id_item3")),
                                                array("Modifier","conf-hommes-engagés",array("affet"=>"id_item","param2"=>"id_item3"))
                                            ));                                           
                                        ?>
                                        </div>
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
    function handleSubmitButtonStat() {
    var Button_submit = document.getElementById("id_SubmitClick");
    Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
    Button_submit.disabled = true;
    var Theme = $('#Theme');
    var Localité = $('#Localité');
    var DebutActivite = $('#DebutActivite');
    var FinActivite = $('#FinActivite');
    var NombreParticipans = $('#NombreParticipans');

    //start labels of feedbacks
    var labelrerr = $('#theme_feeback');
    labelrerr.css('display', 'none');
    var labelrerrlocalité = $('#localité_feeback');
    labelrerrlocalité.css('display', 'none'); 
    var labelrerrdebutactv = $('#debutactivite_feeback');
    labelrerrdebutactv.css('display', 'none'); 
    var labelrerrfinactiv = $('#finactivite_feeback');
    labelrerrfinactiv.css('display', 'none'); 
    var labelrerrparticipants= $('#participants_feeback');
    labelrerrparticipants.css('display', 'none'); 
    //end labels of feedbacks

    Theme.on('input', checkFieldsState);
    Localité.on('input', checkFieldsState);
    DebutActivite.on('input', checkFieldsState);
    FinActivite.on('input', checkFieldsState);
    NombreParticipans.on('input', checkFieldsState);

    

    function checkFieldsState() {
        var ThemeVal = Theme.val();
        var LocalitéVal = Localité.val();
        var DebutActiviteVal = DebutActivite.val();
        var FinActiviteVal = FinActivite.val();
        var NombreParticipanVal = NombreParticipans.val();
        // Activer le bouton uniquement si les deux champs sont remplis
        // et que la longueur du username est d'au moins 3 caractères
        if (ThemeVal && LocalitéVal && DebutActiviteVal && FinActiviteVal && NombreParticipanVal && ThemeVal.length >= 3 && NombreParticipanVal >=1 && FinActiviteVal >= DebutActiviteVal ) {            
            Button_submit.setAttribute("class", "btn btn-primary");
            Button_submit.disabled = false;
            labelrerrlocalité.css('display', 'none');
            labelrerrdebutactv.css('display', 'none');
            labelrerrfinactiv.css('display', 'none');
            labelrerrparticipants.css('display', 'none');            
            
        }
        else if(ThemeVal.length >= 3){
         labelrerr.css('display', 'none');
        }
        else{
         Button_submit.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
         Button_submit.disabled = true;
         labelrerr.css('display', 'block');
         labelrerr.text('Aumoin 3 caractères pour le thème');
         labelrerrlocalité.css('display', 'block');
         labelrerrlocalité.text('veuillez choisir une localité');
         labelrerrdebutactv.css('display', 'block');
         labelrerrdebutactv.text('la date de la debut doit etre inférieur ou égale à celle de la fin');
         labelrerrfinactiv.css('display', 'block');
         labelrerrfinactiv.text('la date de la fin doit etre supérieur ou égale à celle du debut');
         labelrerrparticipants.css('display', 'block');
         labelrerrparticipants.text('Veuillez renseigner un nombre positif.');
        }
        
        
    }
    }

    // Appel de la fonction lors du chargement du document
    $(document).ready(function() {
        handleSubmitButtonStat();
    Form_submition("#action_add_activite","id_SubmitClick", "progress","id_addparticipants");
    });

    </script>

    
</body>

</html>
