<?php
Routeur::get ("/",function (){
    require "Views/features/loginFront.php";
});
Routeur::get ("/DataMGRpanel",function (){
    require "Views/index.php";
});
Routeur::get ("/action_add_activite",function (){
    require "Views/ajax_connectors/MT_ADD_ACTIVITE.php";
});
Routeur::get ("/ajouterUneactivité",function (){
    require "Views/index.php";
});
Routeur::get ("/login",function (){
    require "Views/features/loginFront.php";
});
// Routeur::get ("/tables",function (){
//     require "";
// });
?>