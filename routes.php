<?php
Routeur::get ("/",function (){
    require "Views/index.php";
});
Routeur::get ("/DataMGRpanel",function (){
    require "Views/index.php";
});
Routeur::get ("/action_add_activite",function (){
    require "Views/ajax_connectors/MT_ADD_ACTIVITE.php";
});
Routeur::get ("/action_add_volet",function (){
    require "Views/ajax_connectors/MT_ADD_VOLETS.php";
});
Routeur::get ("/config_activites",function (){
    require "Views/ajax_connectors/mt_config_activites.php";
});
Routeur::get ("/config_localite",function (){
    require "Views/ajax_connectors/cofing_localite.php";
});
Routeur::get ("/ajouterUneactivité",function (){
    require "Views/index.php";
});
Routeur::get ("/login",function (){
    require "Views/features/loginFront.php";
});
Routeur::get ("/conf-volets",function (){
    require "Views/features/MT_FT_VOLETS.php";
});
Routeur::get ("/conf-activités",function (){
    require "Views/features/MT_FT_ACTIVITES.php";
});
// Routeur::get ("/tables",function (){
//     require "";
// });
Routeur::get ("/conf-localites",function (){
    require "Views/features/front_config_localites.php";
});
Routeur::get ("/conf-utilisateurs",function (){
    require "Views/features/config_users.php";
});
// roles manager
Routeur::get ("/conf-postes",function (){
    require "Views/features/front_config_roles.php";
});
Routeur::get ("/conf_roles",function (){
    require "Views/ajax_connectors/cofing_roles.php";
});
// roles manager
Routeur::get ("/conf-hommes-engagés",function (){
    require "Views/features/front_config_hommes_engages.php";
});
Routeur::get ("/conf_h_eng",function (){
    require "Views/ajax_connectors/hommes_engages.php";
});
// roles manager
Routeur::get ("/conf-structures",function (){
    require "Views/features/front_config_structure.php";
});
Routeur::get ("/conf_structure",function (){
    require "Views/ajax_connectors/config_structure.php";
});
// pages 
Routeur::get ("/add",function (){
    require "Views/standard_pages/insert.php";
});
Routeur::get ("/update",function (){
    require "Views/standard_pages/update.php";
});
Routeur::get ("/grid",function (){
    require "Views/standard_pages/grid.php";
});
/*******************
 * Login
*********************** */

Routeur::get ("/login_controler",function (){
    require "Views/ajax_connectors/control_logins.php";
});
?>