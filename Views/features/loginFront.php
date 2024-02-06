<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/applets/assets/css/customised-style/style.css">
    <link rel="stylesheet" type="text/css" href="Views/applets/assets/css/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="Views/applets/assets/css/style.css">
    <title>aidprofen data manager</title>
</head>
<?php 
 //require "Views/required_files/includes/head.php";          
?> 
<body>
    <div class="app app2">
        <div class="block_left" style="background-image: url('Views/applets/assets/images/pdis.webp');background-repeat: no-repeat;background-size: cover;" >
            <!-- <img src="Views\images\pdis.webp" alt="" width="100%"> -->
             <div class="enseign_container">
                <div class="domaine">Data Base Manager</div> 
                <div  class="continent"> aidprofen.</div>               
             </div>
        </div>
        <div class="block_right"> 
                          
            <form id="login_controler" action="login_controler" class="formulaire" method="POST">
            <h4 class="h4">Admin Space.</h4> 
                    <label for="mail">Nom d'utilisateur ou email</label>
                    <input  class="input_login" id="mail" type="mail"  name="mail" placeholder="Ex : eliezek58@gmail.com" required>                    
                    <div id="mail_feedback" class='col-form-label' style='font-size:13px;color:#FC7777;'>obligatoitre</div>

                    <label for="password">Mot de pass</label>
                    <input class="input_login" id="password" type="password"  name="password" placeholder="************" required> 
                    <div id="PASS_feedback" class='col-form-label' style='font-size:13px;color:#FC7777;'>obligatoitre</div>
 
                    <div id="e_retour" style='font-size:14px;color:#FC7777; margin-top:20px;'>
                        désolé, Les informations que vous venez d'utiliser ne correspondent à aucun compte chez nous !
                    </div>
                    <button id="id_SubmitClick" class='btn' style="border-radius:5px; margin-top:30px;" type="submit" name="login">
                        Se connecter
                    </button>          
            </form>     
            
        </div>
    </div>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <!-- Script Ajax pour le formulaire de connexion -->
    <script src="assets/js/script_login.js"></script>
    <?php require "Views/required_files/includes/Custom_includes/javascriptIncusions.php";?>

    <script>  
    // Appel de la fonction lors du chargement du document
    $(document).ready(function() {
    var config = {
    buttonId: "id_SubmitClick",
    inputElements: [
        { id: '#mail', feedbackLabel: '#mail_feedback', errorMessage: 'Doit correspondre à un compte' },
        { id: '#password', feedbackLabel: '#PASS_feedback', errorMessage: 'Rassurez vous que le mot de pass correspond à votre compte' },    ],
    validationRules: {
        '#mail': function(value) { return value && value.length >= 3; },
        '#password': function(value) { return value && value.length >= 5; },
        // Ajoutez d'autres règles de validation au besoin
    }
    };
    handleSubmitButtonState(config);
    Login_on_plateform("#login_controler","id_SubmitClick","e_retour");
    });

    </script>
</body>
</html>