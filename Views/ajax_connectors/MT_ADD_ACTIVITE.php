<?php
header("Acces-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Acces-Control-Allow-Methods:POST");
header("Acces-Control-max-Age:3600");
header("Acces-Control-Allow-Header:Content-Type,Acces-Control-Allow-Header,Autorization,X-Requested-with");


if($_SERVER['REQUEST_METHOD']=='POST') {
    $MT_QueryInterface = new Crud();
    if(isset($_POST['Theme']) && isset(($_POST['Localité'])) && isset(($_POST['DebutActivite'])) && isset(($_POST['FinActivite'])) && isset(($_POST['NombreParticipans']))){
        if(!empty($_POST['Theme'])
         
        && !empty($_POST['Localité']) 
        && !empty($_POST['DebutActivite']) 
        && !empty($_POST['FinActivite']) 
        && !empty($_POST['NombreParticipans'])){

            $MT_QueryInterface->Data_design('insert','aidprofen_rapports_activites_all',
                    array(
                    'Code_activite'=>'code_unik_activ',
                    'Theme'=>'Theme',
                    'Date_debut'=>'DebutActivite',
                    'Date_fin'=>'FinActivite',
                    'localite'=>'Localité',                    
                    'Participants_total'=>'NombreParticipans'
            ));                   
            $resp=$MT_QueryInterface->response;            
            if($resp==1){
                http_response_code(201);
                echo json_encode([
                 "status"=>201,
                 "message"=>"Activité enregistrée avec succès, veuillez continuer"                    
                ]);
            } 
            else{
                http_response_code(410);
                echo json_encode([
                 "status"=>401,
                 "message"=>"$resp"                    
                ]);
            }    
        }  
        else{
            
                http_response_code(402);
                echo json_encode([
                 "status"=>402,
                 "message"=>"données en manque"                    
                ]);
            
        }    
    }    
}
else {
    http_response_code(405);
    echo json_encode([
        "status"=>405,
        "message"=>"mathod non autorisée"
    ]);
}

?>
