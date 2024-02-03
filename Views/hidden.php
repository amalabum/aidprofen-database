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
                                            $list1=array(1=>"kalinga",2=>"katale",2=>"lushagla",2=>"bweremana");                                            
                                            $MT_FORMULAIRES->MT_StandardFormsV1("Rémonter les données sur une activité",
                                                array(
                                                    array("text","Theme","Thème de leactivité",""),
                                                    array("select","Localité","Veuillez choisir une localité",$list1),
                                                    array("date","DebutActivite","","debut_activite"),
                                                    array("date","FinActivite","","fin_activite"),
                                                    array("number","NombreParticipans","PARTICIPANTS","")                                                                
                                            ),"add_activite");
                                            
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

    $(document).ready(function() {        
             
    var messageprogress=document.getElementById("messageprogress");
    var Button_1=document.getElementById("SubmitClick");
    var progressb=document.getElementById("progress");
    var participants=document.getElementById("addarticipants");
    /*
      add info maison ajax
    */
    $('#add_infos_activite').on('submit', function(e) {
        progressb.style.display="block";
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        $.ajax({            
        url: $this.attr('action'),
        enctype: 'multipart/form-data',
        type: $this.attr('method'),
        data: formData,
        dataType: 'json', // JSON
        cache:false,
        contentType: false,
        processData: false,
        success: function(json) {
            progressb.style.display="none";
            console.log(json); 
        // debut du code 201 qui correspond à un requete traitée avec succès
        if (json.status==201){

                    participants.style.display="block";
                    Button_1.setAttribute("class","btn btn-out-dashed waves-light btn-disabled btn-square disabled");
                    Button_1.disabled=true;

                    var message=json.message;
                    //Welcome Message (not for login page)
                    function notify(from, align, type, animIn, animOut ){       
        
            $.growl({
            message: json.message ,
            url: ''
            },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 3500,
            timer: 3000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
             icon_type: 'class',
            template: '<div data-growl="container" style="background:#2ECC71;" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message" ></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
           });
           };
           notify("bottom", "right", "inverse", "fadeInRight","fadeOutRight");   
        }
    } 
        // fin du code 201 qui correspond à un requete traitée avec succès
// debut du code 402 qui correspond à un des champs vides
        else {
        // var message=json.message;
        // //Welcome Message (not for login page)
        // function notify(from, align, type, animIn, animOut ){       

        // $.growl({
        // message: json.message ,
        // url: ''
        // },{
        // element: 'body',
        // type: type,
        // allow_dismiss: true,
        // placement: {
        // from: from,
        // align: align
        // },
        // offset: {
        // x: 30,
        // y: 30
        // },
        // spacing: 10,
        // z_index: 999999,
        // delay: 3500,
        // timer: 3000,
        // url_target: '_blank',
        // mouse_over: false,
        // animate: {
        // enter: animIn,
        // exit: animOut
        // },
        // icon_type: 'class',
        // template: '<div data-growl="container" style="background:#2ECC71;" class="alert" role="alert">' +
        // '<button type="button" class="close" data-growl="dismiss">' +
        // '<span aria-hidden="true">&times;</span>' +
        // '<span class="sr-only">Close</span>' +
        // '</button>' +
        // '<span data-growl="icon"></span>' +
        // '<span data-growl="title"></span>' +
        // '<span data-growl="message" ></span>' +
        // '<a href="#" data-growl="url"></a>' +
        // '</div>'
        // });
        // };
        // notify("bottom", "right", "inverse", "fadeInRight","fadeOutRight");   
    }
        // fin du code 402 qui correspond à un des champs vides
        
    });
    return false;
    });
    $('#plus').on('click', function(e) {
        window.location.href = 'detail_maison?m='+maison_id;
    });
    $('#ok').on('click', function(e) {
        window.location.href = 'add_image_maison?m='+maison_id;
    });
});
    
</script>

    
</body>

</html>
